<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function showUserStats(){
        $id = Auth::user()->id;
        $posts = Post::where('user_id', '=', $id)->get();
        $postsCount = count($posts);
        $user = User::where('id', '=', $id)->get();
        $accountCreatedAt = $user[0]->created_at;
        $accountAge = $accountCreatedAt->diffInDays(Carbon::now(), false);
        $lastUpdate = $user[0]->updated_at;
        $maxGrade = Post::select('grade')->where('user_id', '=', $id)->get()->max()->grade;
        $meanGrade = Post::select('grade')->where('user_id', '=', $id)->get()->avg('grade');
        $meanGrade = number_format($meanGrade, 2, '.', '');

        return view('statistics',
            ['postCount' => $postsCount,
            'createdAt' => $accountCreatedAt,
            'accountAge' => $accountAge,
            'lastUpdate' => $lastUpdate,
            'maxGrade' => $maxGrade,
            'meanGrade' => $meanGrade]);
    }

}
