<div class="card" style="margin-bottom: 15px">
    <div class="card-body ">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('video.index',$video->id) }}"><img src="{{$video->img}}" alt="image" class="rounded" height="130px" width="180px"></a>
            </div>
            <div class="col-md-9">
                <h4 class="card-title"><b>{{ $video->title }}</b></h4>
                <small class="text-muted" style="font-size: 80%">Author: {{ $video->user->name }}</small><br>
                <small class="text-muted">{{ substr(preg_replace ('/<[^>]*>/', ' ', $video->description), 0, 200) }}...</small><br>
                @if(!$video->finish)
                    <small class="text-muted">Status: <strong class="text-danger">Live</strong></small><br>
                @endif
                <a href="{{ route('video.index',$video->id) }}"><button class="btn btn-sm">Watch Now!</button></a>
            </div>
        </div>
    </div>
</div>
