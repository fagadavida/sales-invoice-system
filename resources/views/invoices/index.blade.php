@extends('layouts.layout')

@section('content')

<div class="card md-12">

  <div class="card-body">

        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('invoices.create') }}"> <i class="fa fa-plus"></i> Create New invoice</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Date</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($invoices as $invoice)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $invoice->name }}</td>
                    <td>{{ $invoice->detail }}</td>
                    <td>{{ $invoice->quantity }}</td>
                    <td>{{ $invoice->price }}</td>
                    <td>{{ $invoice->subtotal }}</td>
                    <td>{{ $invoice->created_at }}</td>

                    <td>
                        <form action="{{ route('invoices.destroy',$invoice->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('invoices.show',$invoice->id) }}"><i class="fa-solid fa-list"></i> Show</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('invoices.edit',$invoice->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endforelse
            </tbody>

        </table>
  </div>
</div>

@endsection
