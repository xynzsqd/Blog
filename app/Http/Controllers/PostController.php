<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('user', 'categories')
            ->latest()->paginate(10);
        $categories = Category::query()->get();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function search(Request $request): View
    {
        $query = $request->input('query');
        $categorySlug = $request->input('category');
        $sort = $request->input('sort');

        $posts = Post::query()->with('user', 'categories');

        if (!empty($query)) {
            $posts->where('title', 'like', "%$query%")
                ->orWhere('content', 'like', "%$query%");
        }

        if (!empty($categorySlug)) {
            $posts->whereHas('categories', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        if ($sort === 'newest') {
            $posts->latest();
        } else {
            $posts->oldest();
        }

        $posts = $posts->paginate(10);
        $categories = Category::query()->get();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function create(): View
    {
        $categories = Category::query()->get();
        return view('posts.create', compact('categories'));
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
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:categories,id'],
        ]);
        $data['user_id'] = auth()->id();
        $data['slug'] = Post::generateUniqueSlug($data['title']);

        $post = Post::query()->create($data);
        if (!empty($data['categoriest'])) {
            $post->categories()->sync($data['categories']);
        }
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

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();
        return back();
    }
}
