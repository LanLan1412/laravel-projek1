<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="tempatnya mencari baju anak muda terlengkap yang pernah ada">
      <meta name="keywords" content="baju anak muda">

      <title>XXX | Login</title>

      <!-- CSS -->
      <link rel="stylesheet" href="{{ asset('css/loginIndex.css') }}">

      <!-- Google Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
      
    </head>
<body>
  <section class="login-row">
    <div class="errors">
      @error('name')
        <div class="error">
          {{ $message }}
        </div>
      @enderror
      @error('email')
        <div class="error">
          {{ $message }}
        </div>
      @enderror
      @error('password')
        <div class="error">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="login">
      <h1>Registration</h1>
      <form action="/register" method="post">
      @csrf 
      <div class="li">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Ahmad Giri Kusmanto" required value="{{ old('name') }}">
      </div>  
      <div class="li">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="email@gmail.com" required value="{{ old('email') }}">
      </div>
      <div class="li">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
      </div>
      <button type="submit">Register</button>
    </form>
    <small class="direct">Already registered? <a href="/login">Login</a></small>
  </section>
  </div>
</body>
</html>