@extends('layouts.app')

@section('title', $user->name)

@section('main')
    <h2>{{ $user->name }}</h2>
    @if ($user->id === auth()->id())
    <a href="{{route('profile.edit')}}">Edit profile</a>
    @endif
    <div>
        <h4>posts:</h4>
        <ol>
            @foreach ($user->posts as $post)
                <li>
                    <span>author: {{ $user->name }}</span>
                    <h3><a href={{ route('posts.show', $post->id) }}>{{ $post->title }}</a></h3>
                    <p>{{ $post->content }}</p>
                    @if ($user->id === auth()->id())
                        <form method="POST" action="{{ route('posts.delete', $post->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit">delete</button>
                        </form>
                        <a href="{{route('posts.edit', $post->id)}}">Edit</a>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
@endsection
