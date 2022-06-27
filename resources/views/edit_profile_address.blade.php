@extends('layouts.layout')
@section('content')
<div class="container">
    <h2 class="text-center mt-3">Edit contact details</h2>
    @if ($errors->any())
      <div class="alert alert-danger mb-5 mt-5">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form method="POST" action="{{ route('profile.update_address')}}" class="mt-5 mb-5">
        
        @csrf
        <input type="hidden" name="id" value="{{$address->id}}" >
        <div class="form-group">
            <label for="address">Address: </label>
            <input type="text" class="form-control"  name="address" value="{{$address->address}}">
          </div>
          <div class="form-group">
            <label for="town">Town: </label>
            <input type="text" class="form-control"  name="town" value="{{$address->town}}">
          </div>
          <div class="form-group">
            <label for="zip_code">Post code: </label>
            <input type="text" class="form-control"  name="zip_code" value="{{$address->zip_code}}">
          </div>
          <div class="form-group">
            <label for="is_default">Is this your default address?: </label>
            <input type="checkbox"   name="is_default" >
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-dark main_color">Submit</button>
          </div>
      </form>
</div>



@endsection