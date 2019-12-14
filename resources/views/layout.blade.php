<!DOCTYPE html>
<html>
    <head>
        <mata charset="utf-8">
        <title>paiza bbs</title>
        @include('style-sheet')
    </head>
    <body>
      @include('nav')
      <div class='container'>
        @yield('content')
      </div>
    </body>
</html>
