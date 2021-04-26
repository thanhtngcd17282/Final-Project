<?php

namespace App\Http\Controllers;

use App\Models\VideoStream;
use Illuminate\Http\Request;

class LiveStreamController extends Controller
{
    public function on_publish(Request $request) {
        if ($request->name == "mystream") {
            return response(200);
        } else {
            return response(401);
        }
    }
}
