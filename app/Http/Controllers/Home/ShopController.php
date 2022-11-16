<?php

namespace App\Http\Controllers\Home;

use App\Category;
use App\Gift;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        $categories=Category::withCount('gifts')->get();
        $gifts=Gift::latest()->paginate(6);

        return view('home.shop')->with([
            'categories'=>$categories,
            'gifts'=>$gifts,
        ]);
    }

    public function product($id)
    {
        $gift=Gift::find($id);
        $related = Gift::where('category_id', $gift->category_id)
                ->limit(4)
                ->orderBy('rating', 'desc')
                ->get();
        return view('home.product')->with([
            'gift'=>$gift,
            'related'=>$related,
        ]);
    }
}
