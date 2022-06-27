@extends('layouts.layout')
@section('content')

<div class="container">
<h2 class="text-center mt-3">Login form</h2>
    <div class="row">
    
        <div class="col-6" >
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        
            <div class="checkout__form">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="text" tabindex="1" size="50" value="" id="email" name="email" class="form-control" required autofocus  />
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    <br />
                    <label for="password" class="col-form-label">Password:</label>
                    <input type="password" tabindex="2" size="22" value="" id="password" name="password" class="form-control" required autocomplete="current-password" />
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    <br />
                    <div class="clear"></div>
                
                <div class="flex items-center justify-end mt-3">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        
                    </div>
                    <p>
                    <button type="submit"  tabindex="3" name="update" class="btn btn-dark  btn-lg main_color mt-3 " >Login</button>
                    </p>
                
                                               
                </form>
            </div>

        </div>
    </div>
            
</div>


@endsection