<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
  /**
   *///コンストラクター
  public function __construct()
  {
      $this->middleware('auth')->except(['index', 'show']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *///初期画面。投稿リストでもある。
    public function index(Request $request)
    {
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $message = 'Welcome my application: ' . $keyword;
            $articles = Article::where('titile', 'like', '%' . $keyword . '%')->get();
        } else {
            $message = 'Welcome my application';
            $articles = Article::all();
        }

        return view('index', ['message' => $message, 'articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *///選択した画像を編集画面にgetで送る。
    public function create(Request $request)
    {
        $posts = $request->url;
        $message = 'New article';

        return view('new',['message' =>$message, 'posts' =>$posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     *///新規投稿のレビューをデータベースに保存する。
    public function store(Request $request, Article $article)
    {

      if($request->content != ""  && $request->titile !=""){
      $article = new Article();
      $user = \Auth::user();

      $article->image_url = $request->url;
      $article->titile = $request->titile;
      $article->content = $request->content;
      $article->user_name = $request->user_name;
      $article->user_id = $user->id;
      $article->save();
      return redirect()->route('article.show',['id'=>$article->id]);
    }else{
      session()->flash('flash_message', '空欄を埋めてください');
      return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     * 
     *///投稿したレビューを表示する。
    public function show(Request $request, $id, Article $article)
    {
    
    $posts = $request->url;

    $message = 'This is your article ';
    $article = Article::find($id);
    $user = \Auth::user();
    if($user) {
       $login_user_id = $user->id;
    } else {
       $login_user_id ='';
    }
    return view('show', ['message' => $message, 'article' => $article, 'login_user_id' =>$login_user_id, 'posts' =>$posts]);
    }

    ///退会する
    public function accountDestroy(Request $request)
    {
        $user = \Auth::user();
        $user ->delete();
        return redirect('/articles');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     * 
     *///投稿したレビューを再び編集する
    public function edit(Request $request, $id, Article $article)
    {
      $message = 'Edit your article ' . $id;
      $article = Article::find($id);
      return view('edit', ['message' => $message, 'article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     * 
     *///@editで編集したデータをポストして保存する
    public function update(Request $request, $id, Article $article)
    {
      $article = Article::find($id);
      $article->titile = $request->titile;
      $article->content = $request->content;
      $article->user_name = $request->user_name;
      $article->save();
      return redirect()->route('article.show',['id'=>$article->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     * 
     *///レビューを削除する
    public function destroy(Request $request, $id, Article $article)
    {
        $article = Article::find($id);
        $article ->delete();
        return redirect('/articles');
    }

    public function image(Request $request, $id, Article $article)
    {
        $article = Article::find($id);
        $article ->delete();
        return redirect('/articles');
    }

    ///検索ページに飛ぶ
    public function getCover(Request $request)
    {
        
        if($request->filled('content')){
          $content= $request->content;
          $data = "https://www.googleapis.com/books/v1/volumes?q=" .urlencode($content) ."&maxResults=10";
          $json = file_get_contents($data);
          $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
          $json_decode = json_decode($json,true);
        }else {
          $json_decode = [];
        }
        return view('getCover', ['json_decode' =>$json_decode]);
    }

    ///テスト
    public function test()
    {
        
          $data = "https://www.googleapis.com/books/v1/volumes?q=鬼滅の刃&maxResults=10";
          $json = file_get_contents($data);
          
          var_dump($json);
        return view('test');
    }
}
