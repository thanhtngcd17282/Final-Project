<?php

namespace App\Http\Controllers;

use App\Events\NewCommentEvent;
use App\Models\Comment;
use App\Models\VideoStream;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(VideoStream $video)
    {
    	return response()->json(
    		$video->comments()->with('user')->where('video_stream_id',$video->id)->latest()->limit(50)->get()
		);
    }

    public function store(VideoStream $video)
    {
    	$comment = Comment::create([
    		'body' => request('body'),
    		'user_id' => request('userid'),
    		'video_stream_id' => $video->id
		]);

        $comment = Comment::where('id', $comment->id)->with('user')->first();

		broadcast(new NewCommentEvent($comment))->toOthers();

		return $comment;
    }
}
