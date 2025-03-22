<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
        ]);
        $data['user_id'] = auth()->id();

        Post::query()->create($data);
        return redirect()->route('home');
    }

    public function create(): View
    {
        return view('posts.create');
    }
}
