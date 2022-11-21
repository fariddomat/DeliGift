<?php

namespace App\Http\Controllers\Home;

use App\Gift;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrdersGifts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addToCart($id)

    {
        $gift = Gift::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
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

        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }

    }


    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }

    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=> 'required',
            'phone'=> 'required',
            'delivery_date'=> 'required',
            'delivery_time'=> 'required',
            'city'=> 'required',
            'address'=> 'required',
            'details'=> 'required',
        ]);

        $order=Order::create([

            'user_id'=> Auth::user()->id,
            'name'=> $request->name,
            'phone'=>  $request->phone,
            'delivery_date'=>  $request->delivery_date,
            'delivery_time'=>  $request->delivery_time,
            'city'=>  $request->city,
            'address'=>  $request->address,
            'details'=>  $request->details,
        ]);
        foreach( session('cart') as $id=>$item){
            // dd($id);
            OrdersGifts::create([
                'order_id'=>$order->id,
                'gift_id'=>$id,
                'count'=>$item['quantity']
            ]);

        }

        return redirect()->route('account');
    }

}
