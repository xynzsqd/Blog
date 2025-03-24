@extends('layouts.app')

{{-- page title --}}
@section('title', 'Home')

@section('main')
    @auth
        <h1>Welcome, {{ auth()->user()->name }}!</h1>
    @else
    <h1>Welcome, guest!</h1>
    @endauth
@endsection
