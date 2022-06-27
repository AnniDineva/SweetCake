@extends('layouts.layout')
@section('content')
  <div class="container">
      <h2 class="text-center mt-3">My profile</h2>
      <div class="card mt-5 mb-5 " style="width: 50rem;">
          <h5 class="card-title text-center mt-3">Contact details:
              <a href="{{route('profile.edit', ['profile' => auth()->id()])}}" class="float-right mr-5 ">Edit</a>
          </h5>
          <ul>
              <li class="list-group-item">Name: <span class="fw-bold"> {{auth()->user()->name }}</span></li>
              <li class="list-group-item"> Phone number: {{auth()->user()->phone }}</li>
              <li class="list-group-item">Email: {{auth()->user()->email }}</li>
          </ul>
      </div>
      <div class="card mt-5 mb-5 " style="width: 50rem;">
        <h5 class="card-title text-center mt-3">Addresses:</h5>
        <ul>
            @foreach ($addresses as $address)
                @if ($address->is_default==1)
                    <li class="list-group-item text-danger">{{$address->zip_code}}, {{$address->town}}, {{$address->address}}
                        <a href="{{route('profile.edit_address', ['id' => $address->id])}}" class="float-right mr-5 ">Edit</a>
                        <span class="float-right mr-5">Default address</span>
                    </li>
                
                @else
                    <li class="list-group-item">{{$address->zip_code}}, {{$address->town}}, {{$address->address}}
                        <a href="{{route('profile.edit_address', ['id' =>$address->id])}}" class="float-right mr-5 main_link ">Edit</a>
                        <button type="button" class="btn btn-danger float-right mr-5 deladdr" data-toggle="modal" data-target="#deleteAddress" data-action="{{route('profile.destroy', ['profile' =>$address->id])}}" >
                            Delete
                          </button>
                    </li>
                @endif
            @endforeach
            
        </ul>
    </div>
  </div>

  
<!-- Modal -->
<div class="modal fade" id="deleteAddress" tabindex="-1" aria-labelledby="deleteAddressLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteAddressLabel" class="text-center text-danger">Are you want to delete this address?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post" id="removeForm">
            <div class="modal-footer">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark main_color">Yes, delete address</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  
@endsection