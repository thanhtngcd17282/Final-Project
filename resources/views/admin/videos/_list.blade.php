<table class="table table-striped table-sm">
    <caption>{{ $videos->total() }} Videos</caption>
    <thead>
        <tr>
            <th>Name</th>
            <th>Author</th>
            <th>Created_at</th>
            <th>Status</th>
            <th>Comments</th>
            <th>Hide</th>
            <th>Show</th>
        </tr>
    </thead>
    <tbody>
        @foreach($videos as $video)
            <tr>
                <td><a href="{{ route('video.index',$video->id)}}">{{ $video->title }}</a></td>
                <td>{{ $video->user->name }}</td>
                <td>{{ $video->created_at }}</td>
                <td>@if($video->finish)
                    Done
                    @else
                    Live
                    @endif
                </td>
                <td class="text-center">{{ $video->comments->count()}}</td>
                <td>
                    @if($video->deleted_at == null)
                        <a href="{{ route('admin.videos.store', $video->id) }}" class="btn btn-primary btn-sm">
                            </div><i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    @endif
                </td>
                <td>
                    @if($video->deleted_at != null)
                        <a href="{{ route('admin.videos.restore', $video->id) }}" class="btn btn-primary btn-sm">
                            </div><i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $videos->links() }}
</div>
