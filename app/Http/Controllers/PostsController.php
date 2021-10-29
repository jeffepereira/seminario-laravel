<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Post;
use Exception;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index()
    {
        return view('post.index', ['posts' => Post::all()]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StorePostRequest $request)
    {
        if ($request->file('image')->isValid()) {
            $wayImage = Storage::disk('public')->put('image_posts', $request->file('image'));
        } else {
            throw new Exception('The file not exists.');
        }

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $wayImage
        ]);

        return back()->with('success', 'O registro foi salvo com sucesso.');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return back()->with('error', 'Post não encontrado.');
        }
        return view('post.edit', ['post' => $post]);
    }

    public function update(UpdatePostRequest $request)
    {
        $post = Post::find($request->id);
        if (!$post) {
            return back()->with('error', 'Post não encontrado.');
        }
        $wayImage = null;
        if ($request->file('image') && $request->file('image')->isValid()) {
            $wayImage = Storage::disk('public')->put('image_posts', $request->file('image'));
        }

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $wayImage ?? $post->image
        ]);

        return back()->with('success', 'O registro foi atualizado com sucesso.');
    }

    public function destroy(Request $request)
    {
        $post = Post::find($request->id);
        if (!$post) {
            return back()->with('error', 'Post não encontrado.');
        }

        $post->delete();

        return back()->with('success', 'Post excluído com sucesso.');
    }
}
