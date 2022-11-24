@extends('home._layouts._account')

@section('content')
        <!-- ./sidebar -->
        <div class="col-span-9 shadow rounded px-6 pt-5 pb-7" style="background: white;>
            <h4 class="text-lg
            font-medium capitalize mb-4">
            Order information
            </h4>
            <div class="space-y-4">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <h3>
                                    {{ $order->represntative_note }}
                                </h3>
                                <table class="min-w-full">
                                    <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                #
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                               Count
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orders_gifts as $index => $item)
                                            @if ($index % 2 == 0)
                                                <tr class="bg-gray-100 border-b">
                                                @else
                                                <tr class="bg-white border-b">
                                            @endif
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <img src="{{ $item->gift->image_path }}" style="max-width: 50px" alt=""></td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $item->gift->name }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $item->count}}
                                            </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <br><br>
                        <form action="{{ route('order.report', $order->id) }}" method="POST">
                            @csrf
                            <textarea name="details" cols="10" class="input-box"></textarea>
                            <button class="inline-block px-6 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-600 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out">Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
