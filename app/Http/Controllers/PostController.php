<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {
        $tags = Tag::all();
        return view('index', [
            'posts' => Post::orderBy('posts.created_at', 'desc')->filter(request(['tag', 'search']))->get(), 
            'tags'=>$tags
        ]);
    }

    public function show(Post $post) {
        return view('post.index', [
            'post' => $post
        ]);
    }

    public function create() {
        $tags = Tag::all();
        return view('post.create', ['tags'=>$tags]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title'=>['required', Rule::unique('posts', 'title')],
            'content'=>'required'
        ]);
        $post = Post::create($formFields);
        $post->tags()->attach($request->tags);
        return redirect('/');
    }

    public function edit(Post $post) {
        $tags = Tag::all();
        return view('post.edit', ['post' => $post, 'tags'=>$tags]);
    }

    public function update(Request $request, Post $post) {
        $formFields = $request->validate([
            'title'=>['required'],
            'content'=>'required'
        ]);
        $post->update($formFields);
        $post->tags()->sync($request->tags);
        return redirect('/');
    }

    public function remove(Post $post) {
        $post->delete();
        return redirect('/');
    }
}
