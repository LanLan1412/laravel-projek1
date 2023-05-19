<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="tempatnya mencari baju anak muda terlengkap yang pernah ada">
      <meta name="keywords" content="baju anak muda">

      <title>XXX | {{ $title }}</title>

      <!-- CSS -->
      <link rel="stylesheet" href="css/style.css">

      <!-- Google Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,700;1,300&display=swap" rel="stylesheet">
      
      {{--  <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />  --}}
    </head>
  <body>
    <header>
      @include('partials.navbar')
    </header>
    <main>
      @yield('main')
    </main>
    <footer>
      @include('partials.footer')
    </footer>
  </body>
</html>