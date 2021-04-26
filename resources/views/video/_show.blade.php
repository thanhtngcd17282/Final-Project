<div class="card" style="margin-bottom: 15px">
    <div class="card-body ">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('video.index',$video->id) }}"><img src="{{$video->img}}" alt="image" class="rounded" height="130px" width="180px"></a>
            </div>
            <div class="col-md-9">
                <h4 class="card-title"><b>{{ $video->title }}</b></h4>
                <small class="text-muted">{{ substr(preg_replace ('/<[^>]*>/', ' ', $video->description), 0, 200) }}...</small><br>
                <small class="text-muted">Status:
                    @if($video->finish)
                        <strong class="text-success">Done</strong></small>
                    @else
                        <strong class="text-danger">Pending</strong></small><br>
                        <strong>Link stream: rtmp://localhost:8000/livestream/</strong><br>
                        <strong>Key: {{ $video->key }} </strong><br>
                        <form action="{{ route('video.finish') }}">
                            <input type="submit" class="btn">
                        </form>
                    @endif
                    @if(!$video->deleted_at == null)
                    <br><strong class="text-danger">Note: Video has been delete by admin</strong>
                    @endif
            </div>
        </div>
    </div>
</div>
