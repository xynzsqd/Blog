@extends('layouts.app')

{{-- page title --}}
@section('title', 'Posts')

{{-- main content --}}
@section('main')
    <h2>Posts</h2>
    <div>
        <form method="GET" action="{{ route('posts.search') }}">
            <div>
                <input name="query" type="text" placeholder="search post">
            </div>
            <div>
                <select name="category">
                    <option value="">All categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Search</button>
        </form>
    </div>
    @if ($posts->isEmpty())
        <p>Posts not found</p>
    @else
        <ol>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('profile.show', $post->user->id) }}">author: {{ $post->user->name }}</a>
                    <h3><a href={{ route('posts.show', $post->slug) }}>{{ $post->title }}</a></h3>
                    @if ($post->categories->isNotEmpty())
                        <ul>
                            @foreach ($post->categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ol>
    @endif
    <div>{{ $posts->appends(request()->query())->links() }}</div>
@endsection
