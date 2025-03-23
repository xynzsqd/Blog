@extends('layouts.app')

{{-- page title --}}
@section('title', '{{ $post->title }}')

@section('main')
    <span>author: {{ $post->user->name }}</span>
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->content }}</p>
@endsection
