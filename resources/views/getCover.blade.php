@extends('layout')

@section('content')


   @foreach ($json_decode['items'] as $item)
   <form action="/article/new" method="post">
      <input type="hidden" value="{{ $item['volumeInfo']['imageLinks']['thumbnail'] }}" name="url">
      <button type="submit"><img src = "{{ $item['volumeInfo']['imageLinks']['thumbnail'] }}" ></button>
   </form>



   @endforeach

{{ Form::model(['route' => ['article.searchCover']]) }}
        <div class='form-group'>
            {{ Form::label('content', 'Book name:') }}
            {{ Form::text('content', null) }}
        </div>
        
        <div class="form-group">
            {{ Form::submit('保存する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('article.getCover') }}>戻る</a>
        </div>
    {{ Form::close() }}
    
@endsection