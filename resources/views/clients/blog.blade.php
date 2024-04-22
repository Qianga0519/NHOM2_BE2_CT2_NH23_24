@extends('layout.site')
@section('js')
<script src="{{url('site')}}/js/blog_custom"></script>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/blog_responsive.css">
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/blog_styles.css">

@endsection
@section('main')


<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">Technological Blog</h2>
    </div>
</div>

<!-- Blog -->

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                    @foreach ($posts as $value)
                    <!-- Blog post -->
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url({{asset('images/'. $value->postImage->url)}})"></div>
                        <div class="blog_text">{{$value->title}}</div>
                        <div class="blog_button"><a href="{{route('blog_single', ['id' => $value['id']])}}">Continue Reading</a></div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="" style="margin-top: 50px">
            {{$posts->appends(request()->all())->links('layout.custom.pagination') }}

        </div>
    </div>

</div>


@endsection
