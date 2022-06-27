@extends('layouts.layout')
@section('content')
<div class="container">
<h4 class="text-center mt-5 mb-5" >Create New Account</h4>
  <div class="row mb-5">
    <div class="col-6">
      
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form method="POST" action="{{ route('register') }}" >
        @csrf
        <fieldset>
            <label for="name" class="col-form-label">First Name: </label>
            <input type="text" tabindex="1" size="22" value="{{old('name')}}" id="firstName" name="name" class="form-control" autofocus/>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br />
            
            <label for="email" class="col-form-label">Email:</label>
            <input type="text" tabindex="3" size="50" value="{{old('email')}}" id="email" name="email" class="form-control" required />
            @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br />
            <label for="password2" class="col-form-label">Password:</label>
            <input type="password" tabindex="4" size="22" value="" id="password2" name="password" class="form-control" />
            @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br />
            <label for="repassword" class="col-form-label">Retype Password:</label>
            <input type="password" tabindex="5" size="22" value="" id="repassword" name="password_confirmation"class="form-control" />
            @error('password_confirmation')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <br />
            <div class="clear"></div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 " href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>                
            </div>
            <button  value="Create New Account" tabindex="6" name="update" class="btn btn-dark main_color mt-5" >{{ __('Register') }}</button>
          </fieldset>
          
        </form>
      </div>
    </div>
  </div><!--.row-->
  <div class="clear"></div>
</div>


@endsection
