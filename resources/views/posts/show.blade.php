@extends('layouts.app')

{{-- page title --}}
@section('title', '{{ $post->title }}')

@section('main')
    <div>
        <span>author: {{ $post->user->name }}</span>
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
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
            <li>
                comment
            </li>
        </ul>
    </div>


@endsection
