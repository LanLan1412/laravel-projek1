@extends('layouts.main')
@section('main')
    <h1>Registration</h1>
    <form action="/register" method="post">
      @csrf
      <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Ahmad Giri Kusmanto" required value="{{ old('name') }}">
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="email@gmail.com" required value="{{ old('email') }}">
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
      </div>
      <button>Register</button>
    </form>
    @error('name')
        {{ $message }}
    @enderror
    @error('email')
        {{ $message }}
    @enderror
    @error('password')
      {{ $message }}
    @enderror
    <small>Already registered? <a href="/login">Login</a></small>
@endsection