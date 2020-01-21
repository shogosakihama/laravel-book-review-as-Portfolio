@extends('layout')

@section('content')
   <h1>edit review</h1>
   <p>{{$message}}</p>
   @if(isset($posts))
<<<<<<< HEAD
   <img style="width:300px;margin-bottom:30px" src={{$posts}}>
   @else
   <h2>sorry! no image</h2>
   @endif

=======
   <img src={{$posts}}>
   @else
   <h2>sorry! no image</h2>
   @endif
>>>>>>> origin/master

   {{ Form::open(['route' =>'article.store'])}}
   <div class = 'form-group'>
          {{ Form::hidden('url',$posts)}}
      </div>
      <div class = 'form-group'>
          {{ Form::label('titile','Title:')}}
          {{ Form::text('titile', null)}}
      </div>
      <div class = 'form-group'>
          {{ Form::label('content','Content:')}}
          {{ Form::text('content',null)}}
      </div>
      <div class='form-group'>
            {{ Form::label('user_name', Auth::user()->name) }}
            {{ Form::hidden('user_name',Auth::user()->name ) }}
        </div>
      <div class = 'form-group'>
          <a href={{ route('article.getCover') }}>画像検索</a>
      </div>
      <div class = 'form-group'>
          {{ Form::submit('作成する', ['class' =>'btn btn-primary'])}}
          <a href={{ route('article.list') }}>一覧に戻る</a>
      </div>
      {{ Form::close() }}
      @if (session('flash_message'))
            <div class="flash_message">
                {{ session('flash_message') }}
            </div>
      @endif
<<<<<<< HEAD
=======
      
>>>>>>> origin/master
@endsection