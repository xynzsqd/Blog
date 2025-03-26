@extends('layouts.app')

{{-- page title --}}
@section('title', $post->title)

@section('main')
    <div>
        <span>author: {{ $post->user->name }}</span>
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        @if ($post->categories->isNotEmpty())
            <ul>
                @foreach ($post->categories as $category)
                    <li>{{$category->name}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div>
        <form method="POST" action="{{ route('comments.store', $post) }}">
            @csrf
            <textarea name="body" cols="30" rows="5"></textarea>
            <button>submit</button>
        </form>
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <ul>
            @foreach ($comments as $comment)
                <li>
                    <p>{{ $comment->body }}</p>
                    @if ($comment->user_id === auth()->id())
                        <form method="POST" action="{{ route('comments.delete', [$post->id, $comment->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">delete</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>


@endsection
