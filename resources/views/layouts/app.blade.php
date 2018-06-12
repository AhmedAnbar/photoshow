<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MLM PhotoShow - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">

  </head>
  <body>
    @include('inc.navbar')
    <div class="container">
      @include('inc.messages')
      @yield('content')
    </div>
    <script type="text/javascript" src="/js/app.js"></script>
  </body>
</html>
