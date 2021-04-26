<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoStream;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return view('admin.videos.index', [
            'videos' => VideoStream::withTrashed()->latest()->paginate(50)
        ]);
    }

    public function store($id){
        VideoStream::withTrashed()->find($id)->update(['finish' => 1]);
        VideoStream::withTrashed()->find($id)->delete();
        return redirect()->back()->with(['class' => 'danger', 'message' => 'Deleted'])->withInput();
    }

    public function restore($id){
        VideoStream::withTrashed()->where('id',$id)->restore();
        return redirect()->back()->with(['class' => 'success', 'message' => 'Restored'])->withInput();
    }

    public function videoByUser($id){
        return view('admin.videos.index', [
            'videos' => VideoStream::withTrashed()->where('user_id',$id)->latest()->paginate(50)
        ]);
    }
}
