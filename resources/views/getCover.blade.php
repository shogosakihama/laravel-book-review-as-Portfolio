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
          <form style="height:200px;width:200px;float:left" action="{{action('ArticleController@create')}}" method="get">
              <input type="hidden" value="{{ $item['volumeInfo']['imageLinks']['thumbnail'] }}" name="url">
              <button type="submit"><img src = "{{ $item['volumeInfo']['imageLinks']['thumbnail'] }}" ></button>
          </form>
      @endforeach
    @endif
    
@endsection