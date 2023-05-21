<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="tempatnya mencari baju anak muda terlengkap yang pernah ada">
      <meta name="keywords" content="baju anak muda">

      <title>XXX | Login</title>

      <!-- CSS -->
      <link rel="stylesheet" href="css/style.css">

      <!-- Google Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
      
    </head>
  <body>
    <section class="login-row">
    <section class="success">
      @if (session()->has('success'))
      <p>{{ session('success') }}</p>
      @endif
    </section>
    <section class="error">
      @if (session()->has('loginError'))
      <p>{{ session('loginError') }}</p>
      @endif
    </section>
    <section class="login">
      <h1>Login</h1>
      <form action="/login" method="post">
        @csrf
        <div class="li">
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
  </section>
</section>
  </body>
</html>
