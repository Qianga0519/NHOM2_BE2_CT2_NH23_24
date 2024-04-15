@extends('layout.admin')
@section('title')
<h1 class="text-primary p-2 h3">ALL PRODUCT</h1>
@endsection
@section('css')

@endsection
@section('messages')
@if (session('del_product_error'))
<div class="alert alert-danger" role="alert">
    {{ session('del_product_error') }}
</div>
@endif
@if (session('del_product_success'))
<div class="alert alert-danger" role="alert">
    {{ session('del_product_success') }}
</div>
@endif
@endsection
@section('content')
<div class="container mt-3">


    <form action="" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <input class="form-control" name="key" value="{{old('key')}}" placeholder="Search...">
        </div>
        <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i></button>
    </form>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Sale</th>
                <th scope="col">Created_at</th>
                <th class="text-right" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($products as $value )
            <tr>
                <td>{{$value['id']}}</td>
                @if($value->productImage->first())
                <td><img src="{{asset('images/'. $value->productImage->first()->url)}}" alt=""></td>
                @else
                <td><img src="{{asset('images/')}}" alt="{{$value->name}}"></td>
                @endif
                <td>{{$value['name']}}</td>
                <td>{{$value['qty']}}</td>
                <td>{{number_format($value['price'])}}</td>
                <td>{{number_format($value['sale_amount'])}}</td>
                <td>{{$value['created_at']->format('d - m - Y')}}</td>
                <td class="text-right">
                    <a href="{{route('product.show',[$value['id']])}}" class="btn btn-danger"><i class="fas fa-solid fa-eye"></i></a>
                    <a href="{{route('product.edit',[$value['id']])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    <a href="{{route('product.destroy',[$value['id']])}}" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="paginate_ct">
        {{$products->appends(request()->all())->links('layout.custom.pagination') }}
    </div>
</div>
<form action="" method="POST" id=form-delete>
    @csrf @method('DELETE')
</form>
@endsection

@section('js')
<script>
    $('.btn-delete').click(function(event) {
        event.preventDefault();
        var _href = $(this).attr('href');
        $('form#form-delete').attr('action', _href)
        if (confirm('Are you sure?')) {
            $('form#form-delete').submit();
        }
    })

</script>
@endsection
