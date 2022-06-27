@extends('layouts.layout')
@section('content')
<div class="container-sm">
    <div class="card text-center">
        <h4 class="text-center mt-5 mb-5" >Forgot password</h4>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
             @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" :value="__('Email')" />

                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button class="btn btn-dark main_color  mb-5">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
    </div>
</div>
@endsection