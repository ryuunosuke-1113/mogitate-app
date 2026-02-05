<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>mogitate</title>
  <link rel="stylesheet" href="{{ asset('css/mogitate.css') }}?v={{ time() }}">
</head>
<body>
  <div class="container">
    <div class="header">
      <a class="logo" href="{{ route('products.index') }}">mogitate</a>
    </div>

    @if (session('success'))
      <p style="color:#065f46; background:#ecfdf5; border:1px solid #a7f3d0; padding:10px 12px; border-radius:12px;">
        {{ session('success') }}
      </p>
    @endif

    @yield('content')
  </div>
</body>
</html>
