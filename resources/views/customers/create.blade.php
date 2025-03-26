@extends('layouts.layout')

@section('content')

<div class="card md-12">
  {{-- <h2 class="card-header">Add New Product</h2> --}}
  <div class="card-body">
    <
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('customers.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                id="inputName"
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputEmail" class="form-label"><strong>Email:</strong></label>
            <textarea
                class="form-control @error('email') is-invalid @enderror"
                name="email"
                id="inputEmail"
                placeholder="email"></textarea>
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputPhone" class="form-label"><strong>Phone:</strong></label>
            <textarea
                class="form-control @error('phone') is-invalid @enderror"
                name="phone"
                id="inputPhone"
                placeholder="phone"></textarea>
            @error('phone')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>

  </div>
</div>
@endsection
