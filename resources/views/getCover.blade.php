@extends('layout')

@section('content')

    {{ Form::model(['route' => ['article.getCover']]) }}
        <div class='form-group'>
            {{ Form::label('content', 'Book name:') }}
            {{ Form::text('content', null) }}
            {{ Form::submit('検索する', ['class' =>'btn btn-primary'])}}
        </div>
        
    {{ Form::close() }}
    

      <div class = 'form-group'>
          <a href={{ route('article.new') }}>戻る</a>
      </div>

    @if ($json_decode)
      @foreach ($json_decode['items'] as $item)
      <form style="height:200px;width:200px;float:left" action="{{action('ArticleController@searchCover')}}" method="post">
          <input type="hidden" value="{{ $item['volumeInfo']['imageLinks']['thumbnail'] }}" name="url">
          <button type="submit"><img src = "{{ $item['volumeInfo']['imageLinks']['thumbnail'] }}" ></button>
      </form>
      @endforeach
    @endif
    

    <!-- @if ($json_decode)
    {{ Form::open(['action' =>'ArticleController@searchCover', 'method' =>'post'])}}
      @foreach ($json_decode['items'] as $item)
      {{ Form::hidden('url',$item['volumeInfo']['imageLinks']['thumbnail']) }}
      {{ Form::button($item['volumeInfo']['imageLinks']['thumbnail'], ['type' =>'submit']) }}
      @endforeach
    {{ Form::close() }}

    @endif -->


@endsection