@extends('layouts.main')

@section('custom-css')
<link href="https://vjs.zencdn.net/7.8.2/video-js.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{ asset('css/stream.css') }}">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
@endsection

@section('content')
@include('shared._header')
<section class="wrapper">
    <div class="inner">
        <div class="row">
            <div class="col-lg-8">
                @if($video->finish == 1)
                    <video-js controls data-setup="{}">
                        <source src="http://139.180.223.204/storage/{{ $video->key }}.flv.mp4" type="video/mp4">
                    </video-js>
                @else
                    <video
                        id="my-video"
                        class="video-js"
                        controls
                        preload="auto"
                        data-setup="{}"
                    >
                        <source src="http://139.180.223.204:8080/hls/{{ $video->key }}.m3u8" type="application/x-mpegURL" res="9999" label="auto" />
                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                    </video>
                @endif

                <h2>{{ $video->title }}</h2>
                <h5 class="mic-info" style="margin-top: 10px">
                    Description: {{ $video->description }}<br>
                    By: <a href="#">{{ $video->user->email }}</a>
                </h5>
                <span id="likes-count-{{ $video->id }}">{{ $video->likes->count() }}</span><span> LIKE</span><br>
                @guest
                @else
                <button onclick="actOnVideo(event);" data-video-id="{{ $video->id }}">@if($blike == null)Like @else Unlike @endif</button>
                <button onclick="donateVideo(event, 1);" data-video-id="{{ $video->id }}">+1 <i class="fas fa-money-bill-alt"></i></button>
                <button onclick="donateVideo(event, 10);" data-video-id="{{ $video->id }}">+10 <i class="fas fa-money-bill-alt"></i></button>
                <button onclick="donateVideo(event, 50);" data-video-id="{{ $video->id }}">+50 <i class="fas fa-money-bill-alt"></i></button>
                <button onclick="donateVideo(event, 100);" data-video-id="{{ $video->id }}">+100 <i class="fas fa-money-bill-alt"></i></button>
                <button onclick="donateVideo(event, 200);" data-video-id="{{ $video->id }}">+200 <i class="fas fa-money-bill-alt"></i></button>
                @endif
            </div>
            @guest
            <p>Login to like and comment</p>
            @endif
            <div class="col-lg-4" id="app">
                <example :user="{{ auth()->user() }}" :video="{{ $video }}"></example>
            </div>
        </div>
    </div>
</section>
@endsection


@section('custom-js')
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="https://vjs.zencdn.net/7.8.2/video.js"></script>
<script src="https://unpkg.com/video.js/dist/video.min.js"></script>
<script src="https://unpkg.com/videojs-flash/dist/videojs-flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous"></script>
@guest
@else
<script type="text/javascript">
    //Like event
    Echo.channel('video-act-events')
        .listen('VideoActActionEvent', function (event) {
            var action = event.action;
            updateVideoStats[action](event.videoID);
        });
    var toggleButtonText = {
        Like: function(button) {
            button.textContent = "Unlike";
        },

        Unlike: function(button) {
            button.textContent = "Like";
        }
    };

    var updateVideoStats = {
        Like: function (videoID) {
            document.querySelector('#likes-count-'+videoID).textContent++;
        },

        Unlike: function(videoID) {
            document.querySelector('#likes-count-'+videoID).textContent--;
        }
    };

    function actOnVideo(event) {
        var videoID = {{ $video->id }};
        var action = event.target.textContent.trim();
        toggleButtonText[action](event.target);
        updateVideoStats[action](videoID);
        axios.post('/video/' + videoID + '/act',{ action: action });
    };
    //donate video
    Echo.channel('video-donate-event')
        .listen('DonateEvent', function (event) {
            alertify.message(event.name +' donate ' + event.price + '$');
        });

    function donateVideo(event, price){
        var videoID = {{ $video->id }};
        axios.post('/donate/' + videoID + '/donate',{ price: price });
    }
</script>
@endif
@endsection
