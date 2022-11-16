<?php

namespace App\Http\Controllers;

use App\Category;
use App\Gift;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $categories=Category::all();
        $latest=Gift::latest()->take(4)->get();
        $recommended=Gift::orderBy('rating', 'desc')->latest()->take(8)->get();
        // dd($latest);
        return view('home.index')->with([
            'categories'=>$categories,
            'latest'=>$latest,
            'recommended'=>$recommended,
        ]);
    }
}
