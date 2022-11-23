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
    <p class="text-gray-600 font-medium">Account</p>
</div>
<!-- ./breadcrumb -->

<!-- account wrapper -->
<div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">

    <!-- sidebar -->
    <div class="col-span-3">
        <div class="bg-white px-4 py-3 shadow flex items-center gap-4">

            <div class="flex-grow">
                <p class="text-gray-600">Hello,</p>
                <h4 class="text-gray-800 font-medium">{{$user->name}}</h4>
            </div>
        </div>

        <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
            <div class="space-y-1 pl-8">
                <a href="{{ route('account') }}" class="relative text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-regular fa-address-card"></i>
                    </span>
                    Manage account
                </a>
                <a href="{{ route('editProfile') }}" class="relative hover:text-primary block capitalize transition">
                    Profile information
                </a>
                <a href="{{ route('changePassword') }}" class="relative hover:text-primary block capitalize transition">
                    Change password
                </a>
            </div>

            <div class="space-y-1 pl-8 pt-4">
                <a href="{{ route('orders') }}" class="relative hover:text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-solid fa-box-archive"></i>
                    </span>
                    My order history
                </a>

            </div>


            <div class="space-y-1 pl-8 pt-4">
                <a href="{{ route('favorite') }}" class="relative hover:text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-regular fa-heart"></i>
                    </span>
                    My favorite
                </a>
            </div>

            <div class="space-y-1 pl-8 pt-4">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf<button href="{{ route('logout') }}" class="relative hover:text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" ></i>
                    </span>


                    Logout
                </button>
                        </form>
            </div>

        </div>
    </div>
    <!-- ./sidebar -->

    @yield('content')

</div>
<!-- ./account wrapper -->

@endsection
