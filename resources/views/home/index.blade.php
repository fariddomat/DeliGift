@extends('home._layouts.master')

@section('body')
    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36" ">
            <div class="container">
                <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
                    best collection for <br> Gift Products
                </h1>
                <p>Choose Your Gift with new and amazing products</p>
                <p>We draw happines on your face.</p>
                <div class="mt-12">
                    <a href="{{ route('shop') }}" class="bg-primary border border-primary text-white px-8 py-3 font-medium
                    rounded-md hover:bg-transparent hover:text-primary">Explore Now</a>
                </div>
            </div>
        </div>
        <!-- ./banner -->
    </div>
        <!-- features -->
        <div class="container py-16">
            <div class="w-10/12 grid grid-cols-3 gap-6 mx-auto justify-center">
                <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                    <img src="{{ asset('home/assets/images/icons/delivery-van.svg') }}" alt="Delivery" class="w-12 h-12 object-contain">
                    <div>
                        <h4 class="font-medium capitalize text-lg">Free Shipping</h4>
                        <p class="text-gray-500 text-sm">Order over $200</p>
                    </div>
                </div>
                <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                    <img src="{{ asset('home/assets/images/icons/money-back.svg') }}" alt="Delivery" class="w-12 h-12 object-contain">
                    <div>
                        <h4 class="font-medium capitalize text-lg">Money Rturns</h4>
                        <p class="text-gray-500 text-sm">If not delivered</p>
                    </div>
                </div>
                <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                    <img src="{{ asset('home/assets/images/icons/service-hours.svg') }}" alt="Delivery" class="w-12 h-12 object-contain">
                    <div>
                        <h4 class="font-medium capitalize text-lg">24/7 Support</h4>
                        <p class="text-gray-500 text-sm">Customer support</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./features -->

        <!-- categories -->
        <div class="container py-16" id="category">
            <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">shop by category</h2>
            <div class="grid grid-cols-3 gap-3">
               @foreach ($categories as $key=>$item)
               <?php
                $x=$key + 1;
               ?>
               <div class="relative rounded-sm overflow-hidden group">
                <img src="{{ asset('home/assets/images/category/'.$x.'.jpg') }}" alt="category 1" class="w-full">
                <a href="{{ route('shop') }}?categories[]={{ $item->id }}"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">{{$item->name}}</a>
            </div>
               @endforeach

            </div>
        </div>
        <!-- ./categories -->

        <!-- new arrival 5-->
        <div class="container pb-16">
            <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">top new arrival</h2>
            <div class="grid grid-cols-4 gap-6">
                @foreach ($latest as $item)
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="{{ $item->image_path }}" alt="product 1" class="w-full">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="{{ route('product', $item->id) }}"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            @if ($item->is_Favored)
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
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{$item->name}}</h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">${{$item->price}}</p>
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
        </div>
        <!-- ./new arrival -->

        <!-- ads -->
        <div class="container pb-16">
            <a href="#">
                <img src="{{ asset('home/assets/images/2.jpg') }}" style="max-height: 250px" alt="ads" class="w-full">
            </a>
        </div>
        <!-- ./ads -->

        <!-- recommended product 6-->
        <div class="container pb-16">
            <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">recomended for you</h2>
            <div class="grid grid-cols-4 gap-6">
                @foreach ($recommended as $item)
<div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="{{ $item->image_path }}" alt="product 1" class="w-full">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                    justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="{{ route('product', $item->id) }}"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            @if ($item->is_Favored)
                            <a href="{{ route('removeFromFavorite', $item->favorite->id) }}"
                                class="text-primay text-lg w-9 h-8 rounded-full bg-white flex items-center justify-center hover:bg-gray-800 transition"
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
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{$item->name}}</h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">${{$item->price}}</p>
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


            </div>
        </div>
        <!-- ./product -->
@endsection
