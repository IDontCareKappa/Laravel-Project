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
        $posts = Post::orderBy('created_at', 'asc')->get();
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

        if (\Auth::user() == null){
            return view('home');
        }

        $post = new Post();
        $post->user_id = \Auth::user()->id;
        $post->message = $request->message;
        $post->title = $request->title;
        if ($post->save()){
            return redirect('posts')->with(['success' => true, 'message_type' => 'success',
                'message' => 'Zapisano post.']);;
        }

        return view('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        if (Auth::user()->id != $post->user_id) {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
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
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }

        $post->title = $request->title;
        $post->message = $request->message;

        if ($post->save()){
            return redirect()->route('posts');
        }

        return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Nie udało się wykonać tej operacji.']);

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
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);;
        }

        if ($post->delete()){
            return redirect()->route('posts');
        } else {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie udało się wykonać tej operacji.']);
        }
    }
}
