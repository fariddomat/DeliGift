@extends('home._layouts.master')

@section('body')

<div class="contain py-16">
    <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
        <h2 class="text-2xl uppercase font-medium mb-1">Create an account</h2>
        <p class="text-gray-600 mb-6 text-sm">
            Register for new account
        </p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="space-y-2">
                <div>
                    <label for="name" class="text-gray-600 mb-2 block">Full Name</label>
                    <input type="text" name="name" id="name"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                        placeholder="fulan fulana">
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div>
                    <label for="email" class="text-gray-600 mb-2 block">Email address</label>
                    <input type="email" name="email" id="email"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                        placeholder="youremail.@domain.com">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div>
                    <label for="password" class="text-gray-600 mb-2 block">Password</label>
                    <input type="password" name="password" id="password"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                        placeholder="*******">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div>
                    <label for="confirm" class="text-gray-600 mb-2 block">Confirm password</label>
                    <input type="password" name="password_confirmation" id="confirm"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                        placeholder="*******">
                </div>
            </div>
            <div class="mt-6">
                <div class="flex items-center">
                    <input type="checkbox" name="aggrement" id="aggrement"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                    <label for="aggrement" class="text-gray-600 ml-3 cursor-pointer">I have read and agree to the <a
                            href="#" class="text-primary">terms & conditions</a></label>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">create
                    account</button>
            </div>
        </form>

        <p class="mt-4 text-center text-gray-600">Already have account? <a href="{{ route('login') }}"
                class="text-primary">Login now</a></p>
    </div>
</div>

@endsection

