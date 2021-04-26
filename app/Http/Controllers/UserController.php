<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.index', [
        ]);
    }

    public function update(Request $request){
        if($request->password === null){
			$data = $request->only('name');
		}
		else{
			$data = $request->only('name', 'password');
			$data['password'] = bcrypt($data['password']);
		}
        $user = User::where('email',$request->email);
        if ($user->update($data)) {
			return redirect()->back()->with(['class' => 'success', 'message' => 'Update Success.']);
		}else{
			return redirect()->back()->with(['class' => 'danger', 'message' => 'Error Database.']);
		}
    }
}
