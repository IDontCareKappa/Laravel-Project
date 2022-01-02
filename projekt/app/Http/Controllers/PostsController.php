<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('postsForm', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'message' => 'required|min:10|max:1000',
        ]);

        if (Auth::user() == null){
            return redirect()->route('/login')->withErrors(['msg' => 'Nie jestes zalogowany']);
        }

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->message = $request->message;
        $post->title = $request->title;
        $post->grade = 0.0;
        $post->grade_count = 0;
        $post->grade_sum = 0;
        $post->users_that_added_grade = "";
        if ($post->save()){
            return redirect('posts')->with(['success' => true, 'message_type' => 'success',
                'msg' => 'Zapisano post.']);
        }

        return redirect()->route('posts')->withErrors(['msg' => 'Nie udało się zapisać postu!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('postDisplay', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (Auth::user() == null){
            return back()->withErrors(['msg' => 'Nie masz dostępu do tej strony!']);
        }
        if (Auth::user()->id != $post->user_id) {
            return back()->withErrors(['msg' => 'Nie jesteś autorem tego postu!']);
        }


        return view('postsEdit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (Auth::user()->id != $post->user_id){
            return back()->withErrors(['msg', 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }

        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'message' => 'required|min:10|max:1000',
        ]);

        $post->title = $request->title;
        $post->message = $request->message;

        if ($post->save()){
            return redirect()->route('posts')->with(['success' => true, 'message_type' => 'success',
                'msg' => 'Zapisano zmiany.']);
        }

        return back()->withErrors(['msg', 'Nie udało się wykonać tej operacji.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (Auth::user()->id != $post->user_id){
            return back()->withErrors(['msg', 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }

        if ($post->delete()){
            return redirect()->route('posts')->with(['success' => true, 'message_type' => 'success',
                'msg' => 'Pomyślnie usunięto post.']);;
        }

        return back()->withErrors(['msg', 'Nie udało się wykonać tej operacji.']);
    }

    public function addGrade($id, $grade)
    {
        $post = Post::find($id);
        $users_that_added_grade = $this->getUsersThatAddedGrade($post);

        if (!$this->isUserAddedGrade($post)){
            $post = $this->updatePostGrade($post, $grade);
            $user_id = (int)Auth::user()->id;
            array_push($users_that_added_grade, $user_id);
            $post->users_that_added_grade = implode(',', $users_that_added_grade);

            if ($post->save()){
                return redirect()->route('posts');
            }
        } else {
            return back()->withErrors(['msg' => 'Już dodałeś ocenę do tego posta!']);
        }

        return back()->withErrors(['msg' => 'Nie udało się wykonać tej operacji!']);

    }

    public function getUsersThatAddedGrade($post){
        $users_that_added_grade = array_map(function ($value){
            return (int)$value;
        }, explode(',', $post->users_that_added_grade));

        return $users_that_added_grade;
    }

    public function isUserAddedGrade($post){
        return in_array(Auth::user()->id, $this->getUsersThatAddedGrade($post));
    }

    public function updatePostGrade($post, $grade){
        $post->grade_count++;
        $post->grade_sum += $grade;
        $post->grade = round($post->grade_sum / $post->grade_count,2);

        return $post;
    }
}
