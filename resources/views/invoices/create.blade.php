@extends('layouts.layout')

@section('content')

<div class="card md-12">

  <div class="card-body">
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 row">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $customer->name }}
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('receipt') }}"><i class="fa fa-arrow-left"></i> Print</a>
        </div>
    </div>
<hr/>

    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <table class="table table-bordered table-striped mt-4">
            <tbody>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="inputName" class="form-label"><strong>Product:</strong></label>
                            <select name="product_id" class="form-control" id="product-dropdown">
                                @foreach ($products as $item )
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
        <td>
            <div class="mb-3">
                <label for="quantity" class="form-label"><strong>Quantity:</strong></label>
                <input
                    type="number"
                    name="quantity"
                    class="form-control @error('quantity') is-invalid @enderror"
                    id="quantity"
                    onkeyup="computeTotal(this.value)"
                    placeholder="Quantity">
            </div>
        </td>
        <td>
            <div class="mb-3">
                <label for="quantity" class="form-label"><strong>Price:</strong></label>
                <input
                    type="number"
                    name="price"
                    class="form-control @error('price') is-invalid @enderror"
                    id="price"
                    placeholder="price">
            </div>
        </td>
        <td>
            <div class="mb-3">
                <label for="subtotal" class="form-label"><strong>Subtotal:</strong></label>
                <input
                    type="number"
                    name="subtotal"
                    class="form-control @error('subtotal') is-invalid @enderror"
                    id="subtotal"
                    placeholder="subtotal">
            </div>
        </td>
        <td>
            <br>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> add</button>
        </td>
    </tr>
    @forelse ($invoices as $invoice)
    <tr>

        <td>{{ $invoice->name }}</td>
        <td>{{ $invoice->quantity }}</td>
        <td>{{ $invoice->price }}</td>
        <td colspan="2">{{ $invoice->subtotal }}</td>

    </tr>
@empty
    <tr>
        <td colspan="4">There are no data.</td>
    </tr>
@endforelse
    </form>

  </div>

  <script>
    function computeTotal(val){
        const price =  document.getElementById("price").value

        document.getElementById("subtotal").value = val * price;
    }
  </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    $(document).ready(function () {

        $('#product-dropdown').on('change', function () {
            var idProduct = this.value;
            $.ajax({
                url: "{{url('getProduct')}}",
                type: "POST",
                data: {
                    id: idProduct,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    document.getElementById("price").value = result.price
                }
            });
        });
    });

</script>
</div>
@endsection
