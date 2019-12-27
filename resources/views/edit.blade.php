@extends('layout')

@section('content')
    <h1>paiza bbs</h1>
    <p>{{ $message }}</p>
    <img style="width:200px;margin-bottom:30px" src={{ $article->image_url }}>
    {{ Form::model($article, ['route' => ['article.update', $article->id]]) }}
        <div class='form-group'>
            {{ Form::label('titile', 'Title:') }}
            {{ Form::text('titile', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('content', 'Content:') }}
            {{ Form::text('content', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('user_name', $article->user_name) }}
            {{ Form::hidden('user_name', $article->user_name ) }}
        </div>
        <div class="form-group">
            {{ Form::submit('保存する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('article.show', ['id' =>  $article->id]) }}>戻る</a>
        </div>
    {{ Form::close() }}
@endsection
