@extends('admin._layouts._app')

@section('content')
<form action="{{ route('admin.gifts.update', $gift->id) }}" method="post" enctype="multipart/form-data">

    <section class="basic-inputs">
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit gift</h4>
                    </div>
                    <div class="card-block">
                        <div class="card-body">
                            <div class="row">

                             @csrf
                                @method('PUT')
                                @include('admin._layouts._error')

                                <div class="col-lg-6">
                                    <h5 class="mt-2">Name</h5>
                                    <input value="{{ old('name', $gift->name) }}" name="name" type="text" class="form-control"
                                        id="basicInput" required>

                                    <h5 class="mt-2">Details</h5>
                                    <textarea name="details" id="" class="form-control">{{ old('details', $gift->details) }}</textarea>
                                    <h5 class="mt-2">Price</h5>
                                    <input value="{{ old('price', $gift->price) }}" name="price" type="number" class="form-control"
                                        id="basicInput" required>

                                        <h5 class="mt-2">Source</h5>
                                        <input value="{{ old('source', $gift->source) }}" name="source" type="text" class="form-control"
                                            id="basicInput" required>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mt-2">Category</h5>
                                    <select name="category_id" class="form-control" id="">
                                        @foreach ($categories as $item)
                                        <option value="{{ $item->id }}" @if ($gift->category_id==$item->id)
selected
                                        @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <h5 class="mt-2">Tags</h5>
                                    <input value="{{ old('tags', $gift->tags) }}" name="tags" type="text" class="form-control"
                                        id="basicInput" required>

                                    <h5 class="mt-2">Rating</h5>
                                    <input value="{{ old('rating', $gift->rating) }}" name="rating" type="number" class="form-control" min="1" max="5"
                                        id="basicInput" required>


                                    <h5 class="mt-2">Image</h5>
                                    <input value="{{ old('img') }}" name="img" type="file" class="form-control"
                                        id="basicInput">

                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-icon btn-info mr-1 mt-2"> Update <i class="fa fa-save"
                                            style="position: relative"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Basic Inputs end -->
</form>
@endsection
