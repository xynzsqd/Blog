@extends('layouts.app')

{{-- page title --}}
@section('title', 'Login')

@section('main')
    <h2>Login</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        {{-- email --}}
        <div>
            <label for="email">email</label>
            <input name="email" type="email" id="email">
        </div>
        {{-- password --}}
        <div>
            <label for="password">password</label>
            <input name="password" type="password" id="password">
        </div>
        <button type="submit">Login</button>
    </form>
@endsection
