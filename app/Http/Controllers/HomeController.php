<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::query()->with(['user', 'categories'])->limit(4)->latest()->get();
        return view('welcome', compact('posts'));
    }
}
