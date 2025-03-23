@extends('layouts.app')

{{-- page title --}}
@section('title', 'Edit')

@section('main')
    <h2>Edit post</h2>

    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input name="title" type="text" id="title" value="{{ $post->title }}">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" type="text" id="content">{{ $post->content }}</textarea>
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
