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
        <p class="text-gray-600 font-medium">Product</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6">
        <div>
            <img src="{{ $gift->image_path }}" alt="product" class="w-full">
        </div>

        <div>
            <h2 class="text-3xl font-medium uppercase mb-2">{{ $gift->name }}</h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">@for ($i = 1; $i <= $gift->rating; $i++)
                    <span><i class="fa-solid fa-star"></i></span>

                    @endfor
                    @for ($i = $gift->rating; $i < 5; $i++)
                    <span><i class="fa fa-star" style="color: gray;"></i></span>
                    @endfor
                </div>
                {{-- <div class="text-xs text-gray-500 ml-3">(150 Reviews)</div> --}}
            </div>
            <div class="space-y-2">

                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Brand: </span>
                    <span class="text-gray-600">{{ $gift->source }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Category: </span>
                    <span class="text-gray-600">{{ $gift->category->name }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Tags: </span>
                    <span class="text-gray-600">{{ $gift->tags }}</span>
                </p>
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-xl text-primary font-semibold">${{ $gift->price }}</p>
                {{-- <p class="text-base text-gray-400 line-through">$55.00</p> --}}
            </div>

            <p class="mt-4 text-gray-600">{{ $gift->details }}</p>

            {{-- <div class="mt-4">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
                <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                    <div class="h-8 w-8 text-base flex items-center justify-center">1</div>
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
                </div>
            </div> --}}

            <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5">
                @if (isset(session('cart')[$gift->id]))
                    <a class="bg-primary border text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition"
                        style="background-color: gold">Added
                        to cart</a>
                @else
                    <a href="{{ route('add.to.cart', $gift->id) }}"
                        class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition">Add
                        to cart</a>
                @endif
                @if ($gift->is_favored)
                <a href="{{ route('removeFromFavorite', $gift->favorite->id) }}"
                    class="border border-gray-300 text-primary px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:text-success transition">
                    <i class="fa-solid fa-heart"></i> Wishlist
                </a>
                @else
                <a href="{{ route('addToFavorite', $gift->id) }}"
                    class="border border-gray-300 text-gray-600 px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:text-primary transition">
                    <i class="fa-solid fa-heart"></i> Wishlist
                </a>
                @endif

            </div>

            <div class="flex gap-3 mt-4">
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- ./product-detail -->


    <!-- related product -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Related products</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($related as $item)
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
                            <div class="flex gap-1 text-sm text-yellow-400">@for ($i = 1; $i <= $item->rating; $i++)
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
                        <a class="bg-primary border text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition"
                            style="background-color: gold">Added
                            to cart</a>
                    @else
                        <a href="{{ route('add.to.cart', $item->id) }}"
                            class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition">Add
                            to cart</a>
                    @endif
                </div>
            @endforeach

        </div>
    </div>
    <!-- ./related product -->
@endsection
