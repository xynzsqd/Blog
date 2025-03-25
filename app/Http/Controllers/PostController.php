<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function show(Post $post): View
    {
        $comments = $post->comments()->with('user')->get();
        return view('posts.show', compact('post', 'comments'));
    }

    public function edit(Post $post): View
    {
        if ($post->user->id !== auth()->id()) {
            return abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
        ]);

        $data['user_id'] = auth()->id();
        $data['slug'] = Post::generateUniqueSlug($data['title']);
        $post = Post::query()->create($data);

        return redirect()->route('posts.show', $post->slug);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
        ]);

        $data['slug'] = Post::generateUniqueSlug($data['title']);
        $post->update($data);

        return redirect()->route('posts.show', $post->slug);
    }

    public function search(Request $request): View
    {
        $query = $request->input('query');
        if (empty($query)) {
            $posts = Post::query()->with('user')->latest()->get();
        } else {
            $posts = Post::query()
                ->where('title', 'like', "%$query%")
                ->orWhere('content', 'like', "%$query%")
                ->with('user')->latest()->get();
        }
        return view('posts.index', compact('posts'));
    }

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();
        return back();
    }
}
