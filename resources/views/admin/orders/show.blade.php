@extends('admin._layouts._app')

@section('content')
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order info</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-lg-6">

                                <table class="table  table-scrollable"
                                    style="  width: auto;  margin-left: 25px;  border: 1px solid;">
                                    <tr>
                                        <td>Status</td>
                                        <td class="">{{ $order->status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sender Name</td>
                                        <td>{{ $order->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Reciver Name</td>
                                        <td>{{ $order->name }}</td>
                                    </tr>

                                    <tr>
                                        <td>Delivery Date</td>
                                        <td>{{ $order->delivery_date }}</td>
                                    </tr>
                                    <tr>
                                        <td>Delivery Time</td>
                                        <td>{{ $order->delivery_time }}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{{ $order->city }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Details</td>
                                        <td>{{ $order->details }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                               @if ($order->represntative_id == Auth::id())
                               @if ($order->status == 'approved')
                               <form action="{{ route('admin.orders.confirm', $order->id) }}" method="post">
                                   @csrf
                                   @method('POST')
                                   <input type="hidden" name="order_id" value="{{ $order->id }}">
                                   <input type="hidden" name="status" value="done">
                                   <button class="btn btn-success mt-2">Mark as done</button>
                               </form>
                               @elseif ($order->status =='pending')
                                   <form action="{{ route('admin.orders.confirm', $order->id) }}" method="post">
                                       @csrf
                                       @method('POST')
                                       <input type="hidden" name="order_id" value="{{ $order->id }}">
                                       <select name="status" class="form-control" id="">
                                           <option value="approved">Approve</option>
                                           <option value="rejected">Reject</option>
                                       </select>
                                       <textarea name="represntative_note" class="form-control mt-2"></textarea>
                                       <button class="btn btn-primary mt-2">save</button>
                                   </form>
                               @endif
                               @else
                                   <h2 class="bg-warning text-white p-2">You are not the represntative how take the order</h2>
                               @endif

                            </div>
                        </div>
                        <br><br>
                        @if ($order->orders_gifts->count() == 0)
                            <div class="table-responsive">
                                <h3 class="mr-3 mb-3">no data found</h3>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-scrollable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Gift Name</th>
                                            <th scope="col">Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orders_gifts as $index => $item)
                                            <tr>
                                                <th scope="row">{{ $index + 1 }}</th>
                                                <td dir="rtl"> <img src="{{ $item->gift->image_path }}"
                                                        style="max-width: 50px" alt=""></td>
                                                </td>
                                                <td dir="rtl">{{ $item->gift->name }}</td>
                                                <td dir="rtl">{{ $item->count }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
@endsection
