@extends('layout.admin')
@section('title')
<h1 class="text-primary p-2 h3">ALL USERS</h1>
@endsection
@section('messages')
@if (session('del_cate_error'))
<div class="alert alert-danger" role="alert">
    {{ session('del_cate_error') }}
</div>
@endif
@if (session('del_cate_success'))
<div class="alert alert-danger" role="alert">
    {{ session('del_cate_success') }}
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
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">City</th>
                <th scope="col">District</th>
                <th scope="col">Ward</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col">Role</th>
                <th scope="col">Created_at</th>
                <th class="text-right" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $value )
            <tr>
                <td>{{$value['id']}}</td>
                <td>
                    @if ($value->avatar)
                    <img src="{{asset('images/'.$value->avatar->url)}}" style="border-radius: 50%" alt="">
                    @else
                    <img src="" style="border-radius: 50%" alt="{{$value->name}}">
                    @endif
                </td>
                <td>{{$value['name']}}</td>
                <td>{{$value['email']}}</td>
                <td>{{$value['gender']}}</td>
                <td>{{$value['city']}}</td>
                <td>{{$value['district']}}</td>
                <td>{{$value['ward']}}</td>
                <td>{{$value['address']}}</td>
                <td>{{$value['status']}}</td>
                <td>{{$value->role->role_name}}</td>   
                <td>{{$value['created_at']}}</td>   
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="paginate_ct">
        {{$users->appends(request()->all())->links('layout.custom.pagination') }}
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
        if (confirm('ban co chac khong?')) {
            $('form#form-delete').submit();
        }
    })
</script>
@endsection
