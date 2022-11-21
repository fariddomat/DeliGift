<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Gift;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Session;
class GiftController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_gifts')->only(['index']);
        $this->middleware('permission:create_gifts')->only(['create','store']);
        $this->middleware('permission:update_gifts')->only(['edit','update']);
        $this->middleware('permission:delete_gifts')->only(['destroy']);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts=Gift::orderBy('name', 'asc')->whenSearch(request()->search)
            ->paginate(5);
        return view('admin.gifts.index',compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.gifts.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:gifts,name',
            'details'=>'required',
            'price'=>'required',
            'tags'=>'required',
            'rating'=>'required',
            'source'=>'required',
            'img'=>'required',
        ]);

        $request_data = $request->except(['img']);

        $img = Image::make($request->img)->resize(250, 200)
            ->encode('jpg');

        Storage::disk('local')->put('public/images/gifts/' . $request->img->hashName(), (string)$img, 'public');
        $request_data['img'] = $request->img->hashName();


        Gift::create($request_data);
        Session::flash('success','Successfully Created !');
        return redirect()->route('admin.gifts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $gift=Gift::find($id);
        return view('admin.gifts.edit',compact('gift', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:gifts,name,' . $id
        ]);
        $gift=Gift::find($id);

        $request_data = $request->except(['img']);
        if ($request->img) {
            Storage::disk('local')->delete('public/images/gifts/' . $gift->img);

            $img = Image::make($request->img)->resize(250,200)
                ->encode('jpg');

            Storage::disk('local')->put('public/images/gifts/' . $request->img->hashName(), (string)$img, 'public');
            $request_data['img'] = $request->img->hashName();
        }


        $gift->update($request_data);

        Session::flash('success','Successfully updated !');
        return redirect()->route('admin.gifts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gift=Gift::find($id);

        Storage::disk('local')->delete('public/images/gifts/' . $gift->img);

        $gift->delete();

        Session::flash('success','Successfully deleted !');
        return redirect()->route('admin.gifts.index');
    }
}
