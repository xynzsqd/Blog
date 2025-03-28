<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post): RedirectResponse
    {
        $request->validate([
            'body' => ['required', 'string', 'max:1000'],
        ]);

        Comment::query()->create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $post->id);
    }

    public function delete(Post $post, Comment $comment): RedirectResponse
    {
        if ($comment->user_id !== auth()->id()) {
            return abort(403);
        }

        $comment->delete();
        return redirect()->back();
    }
}
