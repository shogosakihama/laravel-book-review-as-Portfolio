<!DOCTYPE html>
<html>
    <head>
        <mata charset="utf-8">
        <title>paiza bbs</title>
        <style>body {padding: 10px;}</style>
    </head>
    <body>
        <h1>paiza bbs</h1>
        <p>{{ $message }}</p>
        @foreach ($articles as $article)
            <p>
                <a href='{{ route("article.show", ["id" =>  $article->id]) }}'>
                    {{ $article->content }}
                </a>
            </p>
        @endforeach
    </body>
</html>
