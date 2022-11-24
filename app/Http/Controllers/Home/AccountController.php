<?php

namespace App\Http\Controllers\Home;

use App\Favorite;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        return view('home.account.index')->with([
            'user'=>$user
        ]);
    }

    public function editProfile()
    {
        $user=Auth::user();
        return view('home.account.editProfile')->with([
            'user'=>$user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);
        $user=User::find(Auth::id());
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return view('home.account.editProfile')->with([
            'user'=>$user
        ]);
    }

    public function changePassword()
    {
        $user=Auth::user();
        return view('home.account.changePassword')->with([
            'user'=>$user
        ]);
    }

    public function changePass(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back();

    }

    public function checkout()
    {
        if(!session('cart')){
            return view('home.account.checkout2');
        }
        return view('home.account.checkout');
    }

    public function cart()
    {

        return View('home._layouts._cart');
    }

    public function orders()
    {
        $user=Auth::user();
        $orders=$user->orders;
        return view('home.account.orders')->with([
            'user'=>$user,
            'orders'=>$orders,
        ]);
    }
    public function order($id)
    {
        $user=Auth::user();
        $order=Order::find($id);
        return view('home.account.order')->with([
            'user'=>$user,
            'order'=>$order,
        ]);
    }

    public function favorite()
    {
        $user=Auth::user();
        $favorites=Favorite::where('user_id', Auth::id())->get();
        return view('home.account.favorite')->with([
            'user'=>$user,
            'favorites'=>$favorites,
        ]);
    }

    public function addToFavorite($id)
    {
        Favorite::create([
            'user_id'=>Auth::id(),
            'gift_id'=>$id
        ]);
        return redirect()->back();
    }

    public function removeFromFavorite($id)
    {
        $favorite=Favorite::find($id);
        $favorite->delete();
        return redirect()->back();
    }
}
