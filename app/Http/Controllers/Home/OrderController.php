<?php

namespace App\Http\Controllers\Home;

use App\Coupon;
use App\Gift;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrdersGifts;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addToCart($id)

    {
        $gift = Gift::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $gift->name,
                "quantity" => 1,
                "price" => $gift->price,
                "image" => $gift->image_path
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }



    public function update(Request $request)

    {

        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }


    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'delivery_date' => 'required',
            'delivery_time' => 'required',
            'city' => 'required',
            'address' => 'required',
            'details' => 'required',
        ]);

        $order = Order::create([

            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'phone' =>  $request->phone,
            'delivery_date' =>  $request->delivery_date,
            'delivery_time' =>  $request->delivery_time,
            'city' =>  $request->city,
            'address' =>  $request->address,
            'details' =>  $request->details,
        ]);

        if(!session('cart')){
            $order->price=$request->price;
            $order->save();
        }else{
            foreach (session('cart') as $id => $item) {
                // dd($id);
                OrdersGifts::create([
                    'order_id' => $order->id,
                    'gift_id' => $id,
                    'count' => $item['quantity']
                ]);
            }
        }
        if (session('coupon_id')) {
            $order->coupon_id=session('coupon_id');
            $order->save();
        }

        return redirect()->route('account');
    }

    public function coupon(Request $request)
    {
        $coupon=Coupon::where('code',$request->code)->where('expire_date', '>', now())->first();
        if($coupon){
            $c = session()->put('coupon', $coupon->percent);
            $c_id = session()->put('coupon_id', $coupon->id);
            session()->flash('status', 'Coupon Successfully applied');
        }else{

            session()->flash('status', 'Your Coupon have expired');
        }
        return redirect()->back();

    }

    public function report($id, Request $request)
    {
        $order = Order::find($id);
        if ($order) {
            $report = Report::create([
                'user_id' => Auth::user()->id,
                'order_id' => $id,
                'details' => $request->details,
            ]);
            $report->save();
            return back();
        } else {
            abort(404);
        }
    }
}
