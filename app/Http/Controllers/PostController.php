<?php

namespace CMSTutorial\Http\Controllers;

use Illuminate\Http\Request;
use CMSTutorial\Post;
use Exception;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('post')->withPosts($posts);
    }
    /**
     * get post
     *
     * @param int $id
     * @return View
     */
    public function details($id) {
        try {
            $post = Post::findOrFail($id);
            return view('post-details')->withPost($post);
        } catch (Exception $e) {
            // return 1;
            abort(404, 'Page not found');
        }
    }
    /**
     * create-post
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => 1
        ]);
        return redirect('/posts');
    }
    public function create() {
        return view('create-post');
    }
}
