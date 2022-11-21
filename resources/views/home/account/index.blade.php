@extends('home._layouts._account')

@section('content')
        <!-- info -->
        <div class="col-span-9 grid grid-cols-3 gap-4">

            <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-medium text-gray-800 text-lg">Personal Profile</h3>
                    {{-- <a href="#" class="text-primary">Edit</a> --}}
                </div>
                <div class="space-y-1">
                    <h4 class="text-gray-700 font-medium">{{$user->name}}</h4>
                    <p class="text-gray-800">{{$user->email}}</p>
                    <p class="text-gray-800">Role : {{$user->roles[0]->name}}</p>
                </div>
            </div>

            <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-medium text-gray-800 text-lg">Orders</h3>
                    <a href="{{ route('orders') }}" class="text-primary">View</a>
                </div>
                <div class="space-y-1">
                    <h4 class="text-gray-700 font-medium">Number of orders: {{$user->orders->count()}}</h4>
                </div>
            </div>

            <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-medium text-gray-800 text-lg">Notifications</h3>
                    <a href="#" class="text-primary">View</a>
                </div>
                <div class="space-y-1">
                    <h4 class="text-gray-700 font-medium">New Notifications: {{$user->notifications->count()}}</h4>
                </div>
            </div>

        </div>
        <!-- ./info -->
@endsection
