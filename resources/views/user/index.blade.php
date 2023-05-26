<h1>My Profile</h1>
<p>{{ $user->name }}</p>
<p>{{ $user->email }}</p>
<p>{{ $user->nohp }}</p>
<p>{{ $user->alamat }}</p>
<form action="/profile/update" method="post">
  @csrf
  <div>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" placeholder="Ahmad Giri Kusmanto" required value="{{ old('name', $user->name) }}">
  </div>
  <div>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="email@gmail.com" required value="{{ old('email', $user->email) }}">
  </div>
  <div>
    <label for="nohp">No Telepon</label>
    <input type="number" name="nohp" id="nohp" placeholder="0812345678" required value="{{ old('nohp', $user->nohp) }}">
  </div>
  <div>
    <label for="alamat">Alamat</label>
    <textarea name="alamat" id="alamat" placeholder="Jl Proklamasi No.1" required value="{{ old('alamat') }}">{{ $user->alamat }}</textarea>
  </div>
  <div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
  </div>
  <div>
    <label for="password1">Confirm Password</label>
    <input type="password" name="password1" id="password1" required>
  </div>
  <button type="submit">Register</button>
</form>
@error('name')
    {{ $message }}
@enderror
@error('email')
    {{ $message }}
@enderror
@error('nohp')
    {{ $message }}
@enderror
@error('alamat')
    {{ $message }}
@enderror
@error('password')
  {{ $message }}
@enderror
@error('password1')
  {{ $message }}
@enderror