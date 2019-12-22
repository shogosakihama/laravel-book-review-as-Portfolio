@extends('layout')

@section('content')
   <h1>paiza bbs</h1>
   <p>{{$message}}</p>
   <img src="http://books.google.com/books/content?id=JuF6Bx_BBxYC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api" >
   {{ Form::open(['route' =>'article.store'])}}
      <div class = 'form-group'>
          {{ Form::label('content','Content:')}}
          {{ Form::text('content', null)}}
      </div>
      <div class = 'form-group'>
          {{ Form::label('user_name','Name:')}}
          {{ Form::text('user_name',null)}}
      </div>
      <div class = 'form-group'>
          <a href={{ route('article.getCover') }}>画像検索</a>
      </div>
      <div class = 'form-group'>
          {{ Form::submit('作成する', ['class' =>'btn btn-primary'])}}
          <a href={{ route('article.list') }}>一覧に戻る</a>
      </div>
      {{ Form::close() }}
@endsection