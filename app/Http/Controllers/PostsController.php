<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(StorePostRequest $request)
    {

        // dd($request->all());
        return redirect()->back();
    }
}
