@extends('layouts.app')

{{-- page title --}}
@section('title', 'Register')

@section('main')
    <h2>Sign up</h2>
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        {{-- email --}}
        <div>
            <label for="email">email</label>
            <input name="email" type="email" id="email">
        </div>
        {{-- name --}}
        <div>
            <label for="name">name</label>
            <input name="name" type="text" id="name">
        </div>
        {{-- password --}}
        <div>
            <label for="password">password</label>
            <input name="password" type="password" id="password">
        </div>
        <div>
            <label for="password_confirmation">confirm password</label>
            <input name="password_confirmation" type="password" id="password_confirmation">
        </div>
        <button type="submit">Register</button>
    </form>
@endsection
