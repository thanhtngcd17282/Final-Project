<?php

namespace App\Http\Controllers;

use App\Events\VideoActActionEvent;
use App\Models\Likes;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function actVideo(Request $request, $id)
    {
        $action = $request->get('action');

        switch ($action) {
            case 'Like':
                Likes::create([
                    'user_id' => auth()->user()->id,
                    'video_stream_id' => $id
                ]);
                break;
            case 'Unlike':
                Likes::where('user_id', auth()->user()->id)->where('video_stream_id', $id)->delete();
                break;
        }
        broadcast(new VideoActActionEvent($id, $action))->toOthers();
        return '';
    }
}
