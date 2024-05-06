@extends('layout.admin')
@section('title')
Dashboard
@endsection
@section('css')
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900|Rubik:300,400,500,700,900');

    .contain-main {
        position: relative;
    }

    .logo_container {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 550px;
        height: 140px;
        /* background: red; */
        left: calc(50% - 150px);
        top: calc(50% - 70px);
        /* background: white; */
        box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
        perspective: 600px;
        border-radius: 10px;
        transform-style: preserve-3d;
       
       
    }

    .logo_container a {
        font-family: 'Rubik', sans-serif;
        font-size: 100px;
        font-weight: 500;
        color: white; 
        opacity: .5; transition: 2s;
    }

    .logo_container:hover a{
       opacity: 1;
       transform: translateZ(200px);
       color: #0e8ce4;
    }
    

</style>
@endsection
@section('content')
<section class="content">
    <div class="content-main" onmousemove="rotateLogo(event)">
        <div class="logo_container">
            <a href="{{route('home')}}"><i class="fas fa-tv"></i> SmartS</a>
        </div>
        <img style="width: 100%; height: auto;" src="{{asset('images/bg-admin.jpg')}}" alt="">

    </div>
</section>
@endsection
