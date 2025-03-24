@extends('layouts.app')

{{-- page title --}}
@section('title', 'Posts')

{{-- main content --}}
@section('main')
    <h2>Posts</h2>
    @if ($posts->isEmpty())
        <p>There's no posts yet.</p>
    @else
        <ol>
            @foreach ($posts as $post)
                <li>
                    <a href="{{route('profile.show', $post->user->id)}}">author: {{ $post->user->name }}</a>
                    <h3><a href={{ route('posts.show', $post->slug) }}>{{ $post->title }}</a></h3>
                    <p>{{ $post->content }}</p>
                </li>
            @endforeach
        </ol>
    @endif
@endsection
