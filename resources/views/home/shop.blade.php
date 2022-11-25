@extends('home._layouts.master')

@section('body')
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Shop</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- shop wrapper -->
    <div class="container grid grid-cols-4 gap-6 pt-4 pb-16 items-start">
        <!-- sidebar -->
        <form action="" method="get">
            <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden">
                <div class="divide-y divide-gray-200 space-y-5">
                    <div>
                        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categories</h3>
                        <div class="space-y-2">
                            @foreach ($categories as $key => $item)
                                <div class="flex items-center">
                                    <input type="checkbox" name="categories[]"
                                        @if (!old() || old('categories') == 'on') checked="checked" @endif
                                        value="{{ $item->id }}" id="cat-1"
                                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                                    <label for="cat-1"
                                        class="text-gray-600 ml-3 cusror-pointer">{{ $item->name }}</label>
                                    <div class="ml-auto text-gray-600 text-sm">{{ $item->gifts_count }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-4">
                        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Tags</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" name="tags[]" checked id="brand-1" value="New"
                                    class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                                <label for="brand-1" class="text-gray-600 ml-3 cusror-pointer">New</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="tag[]" checked id="brand-2" value="Old"
                                    class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                                <label for="brand-2" class="text-gray-600 ml-3 cusror-pointer">OLD</label>
                            </div>

                        </div>
                    </div>

                    <div class="pt-4">
                        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
                        <div class="mt-4 flex items-center">
                            <input type="text" name="min" id="min" value="{{ old('min') }}"
                                class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                                placeholder="min">
                            <span class="mx-3 text-gray-500">-</span>
                            <input type="text" name="max" id="max" value="{{ old('max') }}"
                                class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                                placeholder="max">
                        </div>
                    </div>

                    <div class="pt-4">
                        <div class="mt-4 flex items-center">
                            <button
                                class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">Filter</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ./sidebar -->
        </form>
        <!-- products -->
        <div class="col-span-3">

            <div class="grid grid-cols-3 gap-6">
                @if ($gifts->count() > 0)
                @foreach ($gifts as $item)
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="{{ $item->image_path }}" alt="product .$item->id" class="w-full">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="{{ route('product', $item->id) }}"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            @if ($item->isFavored)
                                <a href="{{ route('removeFromFavorite', $item->favorite->id) }}"
                                    class="text-primary text-lg w-9 h-8 rounded-full bg-white flex items-center justify-center hover:bg-gray-800 transition"
                                    title="add to wishlist">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            @else
                                <a href="{{ route('addToFavorite', $item->id) }}"
                                    class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                    title="add to wishlist">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="#">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                {{ $item->name }}</h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">${{ $item->price }}</p>
                            {{-- <p class="text-sm text-gray-400 line-through">$55.90</p> --}}
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-1 text-sm text-yellow-400">

                                @for ($i = 1; $i <= $item->rating; $i++)
                                <span><i class="fa-solid fa-star"></i></span>

                                @endfor
                                @for ($i = $item->rating; $i < 5; $i++)
                                <span><i class="fa fa-star" style="color: gray;"></i></span>
                                @endfor
                            </div>
                            {{-- <div class="text-xs text-gray-500 ml-3">(150)</div> --}}
                        </div>
                    </div>
                    @if (isset(session('cart')[$item->id]))
                        <a class="block w-full py-1 text-center text-white bg-success border"
                            style="background-color: gold">Added
                            to cart</a>
                    @else
                        <a href="{{ route('add.to.cart', $item->id) }}"
                            class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                            to cart</a>
                    @endif

                </div>
            @endforeach
                @else
<h2> No Gifts founds !!!</h2>
                @endif


            </div>
            <div class="text-center m-auto" style="  margin-top: 15px;
             display: table;">
                {{ $gifts->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <!-- ./products -->
    </div>
    <!-- ./shop wrapper -->
@endsection
