<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts', ['posts' => $posts, 'showUserPosts' => false]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $post = new Post();
        return view('postsForm', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'message' => 'required|min:10|max:1000',
        ]);
        $post = new Post();
        $post->fillAttributes(Auth::user()->id, $request->message, $request->title, 0.0, 0, 0, "");

        if ($post->save()) {
            return redirect('posts')->with(['success' => true, 'message_type' => 'success',
                'msg' => 'Zapisano post.']);
        }

        return redirect()->route('posts')->withErrors(['msg' => 'Nie udało się zapisać postu!']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('postDisplay', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if ($post == null) {
            return redirect()->route('posts')->withErrors(['msg' => 'Ten post nie istnieje!']);
        }

        if (Auth::user()->id != $post->user_id) {
            return back()->withErrors(['msg' => 'Nie jesteś autorem tego postu!']);
        }

        return view('postsEdit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('posts')->withErrors(['msg' => 'Ten post nie istnieje!']);
        }

        if (Auth::user()->id != $post->user_id) {
            return back()->withErrors(['msg', 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }

        $this->validate($request, [
            'title' => 'required|min:10|max:100',
            'message' => 'required|min:15|max:3000',
        ]);

        $post->title = $request->title;
        $post->message = $request->message;

        if ($post->save()) {
            return redirect()->route('posts')->with(['success' => true, 'message_type' => 'success',
                'msg' => 'Zapisano zmiany.']);
        }

        return back()->withErrors(['msg', 'Nie udało się wykonać tej operacji.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('posts')->withErrors(['msg' => 'Ten post nie istnieje!']);
        }

        if (Auth::user()->id != $post->user_id) {
            return back()->withErrors(['msg', 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }

        if ($post->delete()) {
            return redirect()->route('posts')->with(['success' => true, 'message_type' => 'success',
                'msg' => 'Pomyślnie usunięto post.']);
        }

        return back()->withErrors(['msg', 'Nie udało się wykonać tej operacji.']);
    }

    public function addGrade($id, $grade)
    {
        if ($grade < 1 || $grade > 5) {
            return redirect()->route('posts')->withErrors(['msg' => 'Wybrano złą ocenę!']);
        }

        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('posts')->withErrors(['msg' => 'Ten post nie istnieje!']);
        }

        if (!$post->isUserAddedGrade()) {
            $post->updatePostGrade($grade);
            $post->addUserToPost(Auth::user()->id);

            if ($post->save()) {
                return redirect()->route('posts')->with(['success' => true, 'message_type' => 'success',
                    'msg' => "Dodano ocenę $grade do postu."]);;
            }
        } else {
            return back()->withErrors(['msg' => 'Już dodałeś ocenę do tego posta!']);
        }

        return back()->withErrors(['msg' => 'Nie udało się wykonać tej operacji!']);
    }

    public function showUserPosts(){
        $id = Auth::user()->id;
        $posts = Post::where('user_id', '=', $id)->get();
        return view('posts', ['posts' => $posts, 'showUserPosts' => true]);
    }

    public function showPostsAscending(){
        $posts = Post::orderBy('created_at', 'asc')->get();
        return view('posts', ['posts' => $posts, 'showUserPosts' => false]);
    }
}
