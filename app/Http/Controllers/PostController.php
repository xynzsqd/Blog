<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request): RedirectResponse
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
