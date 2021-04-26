<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;
use App\Models\VideoStream;

class Dashboard extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard.index',[
            'users' => User::get(),
            'videos' => VideoStream::withTrashed()->get()
        ]);
    }
}
