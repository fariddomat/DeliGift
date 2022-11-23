@extends('home._layouts._account')

@section('content')
    <div class="col-span-9 shadow rounded px-6 pt-5 pb-7">
        <h4 class="text-lg font-medium capitalize mb-4">
            Profile information
        </h4>
        <div class="space-y-4">
            @extends('home._layouts._error')
            <form action="{{ route('updateProfile') }}" method="post">
                @csrf
                @method('POST')
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="first">Name</label>
                        <input type="text" value="{{ $user->name }}" name="name" id="first" class="input-box">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="first">Email</label>
                        <input type="email" value="{{ $user->email }}" name="email" id="first" class="input-box">
                    </div>
                </div>

 <div class="mt-4">
            <button type="submit"
                class="py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium">save
                changes</button>
        </div>

            </form>
        </div>


    </div>
@endsection
