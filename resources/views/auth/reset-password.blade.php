@extends('layouts.layout')
@section('content')
<div class="container-sm">
    <div class="card text-center">
        <h4 class="text-center mt-5 mb-5" >Reset password</h4>
         @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
            <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label for="email" :value="__('Email')" >Email:</label>
                        <br/>
                        <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" :value="__('Password')" >Password: </label>
                        <br/>
                        <input id="password" class="block mt-1 w-full" type="password" name="password" required />
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label for="password_confirmation" :value="__('Confirm Password')" >Comfirm password: </label>
                        <br/>
                        <input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required />
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="btn btn-dark  btn-lg main_color  mb-5">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
    </div>
</div>
@endsection