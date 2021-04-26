@extends('layouts.main')

@section('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<style>
    .slide-item{
        width: 320px;
        height: 250px;
        margin-left: 50px !important;
        text-align: center;
    }
</style>
@endsection

@section('content')
@include('shared._header')
@include('shared._banner')
<!-- Highlights -->
<section class="wrapper">
    <div class="inner">
        <header class="special">
            <h2>Newest video</h2>
        </header>
        <div class="slider">
            @foreach($newest_videos as $newest_video)
            <div class="content slide-item">
                <header>
                    <img src="{{ $newest_video->img }}" alt="" height="150px" width="300px">
                    <h3>{{ $newest_video->title }}</h3>
                </header>
                <a href="{{ route('video.index',$newest_video->id) }}"><button class="btn btn-sm">Watch Now!</button></a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="wrapper">
    <div class="inner">
        <header class="special">
            <h2>More like video</h2>
        </header>
        <div class="slider">
            @foreach($like_videos as $like_video)
            <div class="content slide-item">
                <header>
                    <img src="{{ $like_video->img }}" alt="" height="150px" width="300px">
                    <h3>{{ $like_video->title }}</h3>
                </header>
                <a href="{{ route('video.index',$like_video->id) }}"><button class="btn btn-sm">Watch Now!</button></a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('custom-js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script><script>
    $(".slider").slick({
		slidesToShow: 3,
		slidesToScroll:2,
		arrows:true,
		infinite:true,
		variableWidth:true,
		autoplay: true,
		autoplaySpeed: 3000,
		responsive:[
		{
			breakpoint: 768,
			settings:{
				arrows:false,
				slidesToShow:1,
				slidesToScroll:1,
				variableWidth:false
			}
		}
		]
	});
</script>
@endsection
