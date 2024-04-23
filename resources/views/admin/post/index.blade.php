@extends('layout.admin')
@section('title')
<h1 class="text-primary p-2 h3">ALL MANUFACTURE</h1>
@endsection
@section('css')
<style>

</style>
@endsection
@section('messages')

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
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">User</th>
                <th scope="col">Created_at</th>
                <th class="text-right" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($posts as $value )
            <tr>
                <td>{{$value['id']}}</td>
                <td>  
                    @if($value->postImage)
                    <img src="{{asset('images/' . $value->postImage->url)}}" alt="">
                    @else
                    <img src="" alt="{{$value->title}}">

                    @endif
                </td>
                <td>{{$value->title}}</td>
                <td>{{$value->content}}</td>

                <td>{{$value->user->name}}</td>

                <td>{{$value->created_at->format('d - m - Y')}}</td>
                <td class="text-right">
                    <a href="{{route('post.edit',[$value['id']])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    <a href="{{route('post.destroy',[$value['id']])}}" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="paginate_ct">
        {{$posts->appends(request()->all())->links('layout.custom.pagination') }}
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
