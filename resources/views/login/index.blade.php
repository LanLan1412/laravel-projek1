@extends('layouts.main')
@section('main')
@if (session()->has('success'))
    {{ session('success') }}
@endif
@if (session()->has('loginError'))
    {{ session('loginError') }}
@endif
    <h1>Login</h1>
    <form action="/login" method="post">
      @csrf
      <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="email@gmail.com" required autofocus value="{{ old('email') }}">
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
      </div>
      <button>Login</button>
    </form>
    @error('email')
        {{ $message }}
    @enderror
    <small>Not registered? <a href="/register">Register Now!</a></small>
@endsection