<?php

namespace App\Http\Controllers;

use App\Events\VideoActAction;
use App\Models\Likes;
use App\Models\User;
use App\Models\VideoStream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index($id){
        $video = VideoStream::where('id',$id)->get();
        if(count($video) == 0) return redirect()->back();
        if($video){
            if(auth()->user()){
                return view('video.index',[
                    'video' => $video[0],
                    'blike' => Likes::where('user_id',auth()->user()->id)->where('video_stream_id', $video[0]->id)->first()
                ]);
            }else{
                return view('video.index',[
                    'video' => $video[0],
                    'blike' => null
                ]);
            }

        }
        return redirect()->back();
    }

    public function manage(){
        return view('video.manage',[
            'videos' => VideoStream::withTrashed()->where('user_id',auth()->user()->id)->latest()->paginate(10)
        ]);
    }

    public function create(Request $request){
        $videos = VideoStream::where('finish',0)->where('user_id', Auth::user()->id)->get();
        if(count($videos) == 1){
			return redirect()->back()->with(['class' => 'danger', 'message' => 'You are having a video livestream'])->withInput();
        }
        if($request->hasFile('img')){
            $file = $request->file('img');
            $filename = '/images/videos/'.md5(time()).'.jpg';
            $file->move(public_path('/images/videos/'), $filename);
        }else{
			return redirect()->back()->with(['class' => 'danger', 'message' => 'You must input image'])->withInput();;
        }
        $video = VideoStream::create([
            'title' => $request->title,
            'description' => $request->description,
            'key' => md5(date("Y/m/d")),
            'user_id' => auth()->user()->id,
            'img' => $filename
        ]);
        if($video){
			return redirect()->back()->with(['class' => 'success', 'message' => 'Create success, click video pending to livestream']);
        }
        return redirect()->back()->with(['class' => 'danger', 'message' => 'Error database']);
    }

    public function finishVideo(){
        $video = VideoStream::where('finish',0)->where('user_id', Auth::user()->id)->first();
        $video->finish = 1;
        $video->save();
        return redirect()->back()->with(['class' => 'success', 'message' => 'Finish!']);
    }
}
