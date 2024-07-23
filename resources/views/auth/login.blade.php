@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@push('links')

@endpush

@push('scripts')

@endpush

@section('main')
<div class="login-container">
    <div class="login-box">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</div>
@endsection