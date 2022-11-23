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
        <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden">
            <div class="divide-y divide-gray-200 space-y-5">
                <div>
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categories</h3>
                    <div class="space-y-2">
                        @foreach ($categories as $item)
                            <div class="flex items-center">
                                <input type="checkbox" name="cat-1" id="cat-1"
                                    class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                                <label for="cat-1" class="text-gray-600 ml-3 cusror-pointer">{{ $item->name }}</label>
                                <div class="ml-auto text-gray-600 text-sm">{{ $item->gifts_count }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Tags</h3>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" name="brand-1" id="brand-1"
                                class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="brand-1" class="text-gray-600 ml-3 cusror-pointer">New</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="brand-2" id="brand-2"
                                class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="brand-2" class="text-gray-600 ml-3 cusror-pointer">OLD</label>
                            <div class="ml-auto text-gray-600 text-sm">(9)</div>
                        </div>

                    </div>
                </div>

                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
                    <div class="mt-4 flex items-center">
                        <input type="text" name="min" id="min"
                            class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                            placeholder="min">
                        <span class="mx-3 text-gray-500">-</span>
                        <input type="text" name="max" id="max"
                            class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                            placeholder="max">
                    </div>
                </div>


            </div>
        </div>
        <!-- ./sidebar -->

        <!-- products -->
        <div class="col-span-3">
            <div class="flex items-center mb-4">
                <select name="sort" id="sort"
                    class="w-44 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary">
                    <option value="">Default sorting</option>
                    <option value="price-low-to-high">Price low to high</option>
                    <option value="price-high-to-low">Price high to low</option>
                    <option value="latest">Latest product</option>
                </select>

                <div class="flex gap-2 ml-auto">
                    <div
                        class="border border-primary w-10 h-9 flex items-center justify-center text-white bg-primary rounded cursor-pointer">
                        <i class="fa-solid fa-grip-vertical"></i>
                    </div>
                    {{-- <div
                        class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                        <i class="fa-solid fa-list"></i>
                    </div> --}}
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
                @foreach ($gifts as $item)
                    <div class="bg-white shadow rounded overflow-hidden group">
                        <div class="relative">
                            <img src="{{ $item->image_path }}" alt="product .$item->id"
                                class="w-full">
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
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <div class="text-xs text-gray-500 ml-3">(150)</div>
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


            </div>
             <div  class="text-center m-auto" style="  margin-top: 15px;
             display: table;">
                    {{ $gifts->links( "pagination::bootstrap-4") }}
                </div>
        </div>
        <!-- ./products -->
    </div>
    <!-- ./shop wrapper -->
@endsection
