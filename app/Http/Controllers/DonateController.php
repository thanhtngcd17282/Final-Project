<?php

namespace App\Http\Controllers;

use App\Events\DonateEvent;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function donate(Request $request, $id)
    {
        $action = $request->get('price');
        event(new DonateEvent($id, $action, auth()->user()->name));
        //broadcast(new DonateEvent($id, $action, auth()->user()->name))->toOthers();
        return '';
    }
}
