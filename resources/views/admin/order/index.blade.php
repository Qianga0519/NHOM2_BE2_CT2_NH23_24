@extends('layout.admin')
@section('title')
<h1 class="text-primary p-2 h3">ORDERS</h1>
@endsection
@section('css')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

</style>
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

                <th scope="col">Note</th>

                <th scope="col">Shipping</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">User</th>
                <th scope="col">Order date</th>
                <th class="text-right" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $value )
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->note}}</td>
                <td>{{$value->shipping}}</td>
                <td>{{$value->total}}</td>
                <td>{{$value->status}}</td>
                <td>{{$value->user_id}}</td>
                {{-- <td>
                    <a href="" type="button" class="btn">
                        <i class="fa fa-power-off" aria-hidden="true"></i></a>
                </td> --}}
                <td>{{$value['created_at']->format('d - m - Y | H:s')}}</td>
                <td class="text-right">
                    <a href="{{route('order.show',[$value['id']])}}" class="btn btn-outline-secondary"><i class="fas fa-solid fa-eye"></i></a>
                    {{-- <a href="{{route('product.edit',[$value['id']])}}" class="btn btn-success"><i class="fas fa-edit"></i></a> --}}
                    <a href="{{route('order.destroy',[$value['id']])}}" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="paginate_ct">
        {{$orders->appends(request()->all())->links('layout.custom.pagination') }}
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
