<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index() {
        $user = Auth::user();

        return view('user', compact('user'));
    }

    public function update(Request $request) {

        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|min:5|max:255|unique:users,name,'.$user->id,
            'email' => 'required|email|min:5|max:255|unique:users,email,'.$user->id,
        ]);

        $input = $request->only('name','email');


        $user->update($input);

        return redirect()->route('posts')->with(['success' => true, 'message_type' => 'success',
            'msg' => 'Zapisano zmiany.']);
    }


}
