@extends('layout.site')
@section('js')
<script src="{{url('site')}}/js/blog_single_custom"></script>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/blog_single_responsive.css">
<link rel="stylesheet" type="text/css" href="{{url('site')}}/styles/blog_single_styles.css">

@endsection
@section('main')

<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{url('site')}}/images/blog_single_background.jpg" data-speed="0.8"></div>
</div>

<!-- Single Blog Post -->


	

<div class="single_post">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-8 offset-lg-2">
				<img src="{{asset('images/'.$post->postImage->url)}}" alt="">
                <div class="single_post_title">{{$post['title']}}</div>
                <div class="single_post_text">
                    {{-- <p>Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin. Praesent at tempus lectus, eleifend blandit felis. Fusce augue arcu, consequat a nisl aliquet, consectetur elementum turpis. Donec iaculis lobortis nisl, et viverra risus imperdiet eu. Etiam mollis posuere elit non sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis arcu a magna sodales venenatis. Integer non diam sit amet magna luctus mollis ac eu nisi. In accumsan tellus ut dapibus blandit.</p>
                    <div class="single_post_quote text-center">
                        <div class="quote_image"><img src="images/quote.png" alt=""></div>
                        <div class="quote_text">Quisque sagittis non ex eget vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis in dictum tincidunt, dolor nibh lacinia lacus.</div>
                        <div class="quote_name">Liam Neeson</div>
                    </div>
					<p>Praesent ac magna sed massa euismod congue vitae vitae risus. Nulla lorem augue, mollis non est et, eleifend elementum ante. Nunc id pharetra magna. Praesent vel orci ornare, blandit mi sed, aliquet nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p> --}}
               <p>{{$post->content}}</p>
				</div>
            </div>
        
           
         
           
        </div>
    </div>
</div>

<!-- Blog Posts -->

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog_posts d-flex flex-row align-items-start justify-content-between">

                    <!-- Blog post -->
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url(images/blog_4.jpg)"></div>
                        <div class="blog_text">Etiam leo nibh, consectetur nec orci et, tempus tempus ex</div>
                        <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                    </div>

                    <!-- Blog post -->
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url(images/blog_5.jpg)"></div>
                        <div class="blog_text">Sed viverra pellentesque dictum. Aenean ligula justo, viverra in lacus porttitor</div>
                        <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                    </div>

                    <!-- Blog post -->
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url(images/blog_6.jpg)"></div>
                        <div class="blog_text">In nisl tortor, tempus nec ex vitae, bibendum rutrum mi. Integer tempus nisi</div>
                        <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
