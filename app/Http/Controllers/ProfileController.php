<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ProfileController extends Controller
{
    public function show(User $user): View
    {
        $user->load('posts');
        return view('profile.show', compact('user'));
    }
}
