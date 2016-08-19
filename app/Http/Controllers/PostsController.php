<?php

namespace App\Http\Controllers;

use App\Post;
use App\Services\PostsService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    protected $postService;

    /**
     * PostsController constructor.
     *
     * @param $postService
     */
    public function __construct(PostsService $postService)
    {
        $this->postService = $postService;
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Post $post)
    {
        $posts = $post->all();
        return view('blog.index', compact('posts'));
    }


    public function create()
    {
        return view('blog.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
        $post = Post::findOrFail($id)->first();
        return view('blog.show', compact('post'));
    }


    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('blog.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        if ($this->postService->update($request, $id)) {
            session()->flash('sucMsg', 'Post Updated Sucessfully');
            return redirect('posts/' . $id);
        }
        session()->flash('errMsg', 'Post couldn\'t be updated');
        return redirect('posts/' . $id . '/edit');
    }


    public function destroy($id)
    {
        //
        Post::destroy($id);
        return session()->with('success', 'Post Deleted Sucessfully');
    }
}
