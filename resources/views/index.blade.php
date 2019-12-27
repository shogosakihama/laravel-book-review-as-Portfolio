@extends('layout')

@section('content')
        <h1>Book reviews!</h1>
        <p>{{ $message }}</p>
        @include('search')
        <table class='table table-striped table-hover'>
        @foreach ($articles as $article)
        @if( $article->content && $article->titile)
            <tr>
              <td>
                <a href='{{ route("article.show", ["id" =>  $article->id]) }}'>
                    {{ $article->titile }}
                </a>
              </td>
                    <td>{{ $article->user_name }}</td>
            </tr>
            @endif
        @endforeach
        </table>
       @auth
        <div>
           <a href={{ route('article.getCover') }} class='btn btn-outline-primary'>新規投稿</a>
        </div>
       @endauth
@endsection