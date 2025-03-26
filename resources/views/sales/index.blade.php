@extends('layouts.layout')

@section('content')
<?php $i=0;?>
<div class="card md-12">

  <div class="card-body">

        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession


        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div id="panel">
                <input type="search" name="AdmissionNo" id="txtSearch" placeholder="Search here" class="form-control" border="0" />
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('sales.create') }}"> <i class="fa fa-plus"></i> Create New sale</a>
            </div>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Invoice No</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $sale->name }}</td>
                    <td>{{ $sale->phone }}</td>
                    <td>{{ $sale->invoice_no }}</td>
                    <td>{{ $sale->status }}</td>
                    <td>{{ $sale->created_at }}</td>
                    <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('invoices.create',["id"=>$sale->id]) }}"><i class="fa-solid fa-pen-to-square"></i> Cart</a>
                    </td>
                </tr>
           @endforeach
            </tbody>

        </table>


  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$("#txtSearch").on("keyup", function () {
    $("#txtSearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("table tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>

@endsection
