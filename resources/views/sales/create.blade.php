@extends('layouts.layout')

@section('content')

<div class="card md-12">
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('sales.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf

        <div class="mb-3">

            <label for="inputName" class="form-label"><strong>Customer:</strong></label>
            <select name="customer_id" class="form-control">
                @foreach ($customers as $item )
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>

            @error('customer_id')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
            <textarea
                class="form-control @error('note') is-invalid @enderror"
                style="height:150px"
                name="note"
                id="inputDetail"
                placeholder="Note"></textarea>
            @error('note')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Next</button>
    </form>

  </div>
</div>
@endsection
