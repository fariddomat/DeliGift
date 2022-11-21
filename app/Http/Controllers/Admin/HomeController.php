<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Gift;
use App\Http\Controllers\Controller;
use App\Order;
use App\Report;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $categories=Category::count();
        $gifts=Gift::count();
        $users=User::count();
        $orders=Order::count();
        $reports=Report::count();
        return view('admin.index', compact('categories', 'gifts', 'users', 'orders', 'reports'));
    }
}
