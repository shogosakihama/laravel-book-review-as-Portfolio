@extends('layout')

@section('content')
        <h1>paiza bbs</h1>
        <p>{{ $message }}</p>
        <img style= width:300px;float:left src= {{ $posts }} >
        <p style=float:left>{{ $article->content }}</p>
        <br>
        <p>{{ $article->user_name }}</p>
        <p>
            <a href={{ route('article.list') }} class='btn btn-outline-primary'>一覧に戻る</a>
        </p>
        <div>
            @auth 
              @if ($article->user_id ===$login_user_id)
                    {{ Form::open(['method' => 'delete', 'route' => ['article.delete', $article->id]]) }}
                        {{ Form::submit('削除',['class'=>'btn btn-outline-secondary']) }}
                        <a href={{ route('article.edit',['id' =>$article->id]) }} class='btn btn-outline-primary'>編集</a>
                    {{ Form::close() }}
              @endif
            @endauth
        </div>
@endsection
