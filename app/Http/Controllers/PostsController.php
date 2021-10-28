<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
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
        return view('create');
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
}
