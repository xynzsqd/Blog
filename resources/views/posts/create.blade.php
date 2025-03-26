@extends('layouts.app')

{{-- page title --}}
@section('title', 'Create')

@section('main')
    <h2>Publish new post</h2>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input name="title" type="text" id="title">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" type="text" id="content"></textarea>
        </div>
        <div>
            <select name="categories[]" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Publish</button>
    </form>
@endsection
