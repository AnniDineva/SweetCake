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
      <form method="POST" action="{{ route('profile.update', ['profile' => auth()->id()]) }}" class="mt-5 mb-5">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" class="form-control"  name="name" value="{{auth()->user()->name}}">
          </div>
          <div class="form-group">
            <label for="phone">Phone: </label>
            <input type="text" class="form-control" name="phone" value="{{auth()->user()->phone}}">
          </div>
          <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" class="form-control" name="email"  value="{{auth()->user()->email}}">
          </div>
          <button type="submit" class="btn btn-dark main_color">Submit</button>
      </form>
</div>

@endsection