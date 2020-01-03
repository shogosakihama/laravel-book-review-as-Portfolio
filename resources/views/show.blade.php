@extends('layout')

@section('content')
      <div style="padding-left:50px">
        <h1>review</h1>
        <p>{{ $message }}</p>
        <!-- <img style= width:300px;float:left src= {{ $posts }} > -->
        <img style="width:300px;margin-bottom:30px" src={{ $article->image_url }}>
        <div style="display: inline-block;padding-left:50px;position:relative;bottom:100px;font-size:130%;width:700px">
        <p style="margin-bottom:10px;border-bottom:dotted 1px #00e7ff">{{ $article->titile }}</p>
        <p style="display:none">{{ $article->user_name }}</p>
        <p style="margin-right:100px;padding-top:50px">{{ $article->content }}</p>
        </div>
        <p></p>
        <div>
        {{ Form::open(['method' => 'posts', 'route' => ['likes.like', $article->id]]) }}
               {{ Form::submit('いいね',['class'=>'btn btn-outline-secondary']) }}
           {{ Form::close() }}
        </div>
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
      </div>
@endsection





<!-- @if (Auth::id() != $user->id)
         
         @if (Auth::user()->is_like($article->id))

             {!! Form::open(['route' =>['likes.unlike',$article->id],'method'=>delete]) !!}
                 {!! Form::submit('いいねを外す',['class'=>"button btn btn-warning"]) !!}
             {!! Form::close() !!}
         @else
             {!! Form::open(['route'=>['likes.like',$article->id]]) !!}
                 {!! Form::submit('いいねをつける',['class'=>"button btn btn-success"]) !!}
             {!! Form::close() !!}

         @endif

     @endif -->