<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function checkout()
    {
        
        return view('home.account.checkout');
    }

    public function cart()
    {
        
        return View('home._layouts._cart');
    }

}
