<?php

namespace App\Http\Controllers;

use App\Models\VideoStream;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()) {
            $newest_videos = VideoStream::Limit(6)->get();
            $like_videos = VideoStream::Limit(6)->get();
            return view('home', [
                'newest_videos' => $newest_videos,
                'like_videos' => $like_videos
            ]);
        }else{
            return view('home2');
        }
    }
}
