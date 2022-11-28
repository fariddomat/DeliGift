@extends('admin._layouts._app')

@section('content')
    <!-- Striped rows start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Reports</h4>
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




                    @if ($reports->count() == 0)
                    <div class="table-responsive">
                    <h3 class="mr-3 mb-3"  >no data found</h3>
                    </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-striped table-scrollable">
                            <thead>
                                <tr>
                                    <th scope="col">Order Number</th>
                                    <th scope="col">Reporter Name</th>
                                    <th scope="col">Represntative Name</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $index => $report)
                                    <tr >
                                        <th scope="row">{{ $report->order_id }}</th>
                                        <td>{{ $report->user->name }}</td>
                                        <td>@if ($report->order->represntative)
                                            {{ $report->order->represntative->name }}
                                        @else
No one yet !
                                        @endif</td>
                                        <td>{{ $report->details }}</td>
                                        <td>{{ $report->status }}</td>
                                        <td class="form-group">

                                            <a href="{{ route('admin.reportCheck', $report->id) }}" type="button"
                                                class="btn btn-icon btn-success mr-1"
                                                style="  min-width: 100px;">Check <i class="fa fa-book"
                                                    style="position: relative;"></i></a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="text-center m-auto">{{ $reports->appends(request()->query())->links() }}
                    </div>
                    @endif


                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
@endsection
