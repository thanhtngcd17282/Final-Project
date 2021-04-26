<?php

namespace App\Http\Controllers;

use App\Models\VideoStream;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $videos = VideoStream::where('title', 'like', '%' . $request->key . '%')->paginate(20);
        return view('search.index',[
            'videos' => $videos
        ]);
    }
}
