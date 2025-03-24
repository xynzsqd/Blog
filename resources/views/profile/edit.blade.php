@extends('layouts.app')

@section('title', 'edit profile')

@section('main')
    <h2>Edit profile</h2>

    @if ($errors->updateProfileInformation->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->updateProfileInformation->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <form method="POST" action="{{ route('user-profile-information.update') }}">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Username</label>
                <input name="name" type="text" id="name" value="{{ $user->name }}">
            </div>
            <div>
                <label for="email">Email</label>
                <input name="email" type="text" id="email" value="{{ $user->email }}">
            </div>
            <button type="submit">Save</button>
        </form>
        <h2>Change password</h2>
        @if ($errors->updatePassword->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->updatePassword->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT')
            <div>
                <label for="current_password">Current password</label>
                <input name="current_password" type="password" id="current_password">
            </div>
            <div>
                <label for="password">New password</label>
                <input name="password" type="password" id="password">
            </div>
            <div>
                <label for="password_confirmation">Confirm password</label>
                <input name="password_confirmation" type="password" id="password_confirmation">
            </div>
            <button type="submit">Change password</button>
        </form>
    </div>
@endsection
