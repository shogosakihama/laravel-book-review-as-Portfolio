<?php

namespace App\Http\Controllers;

use App\Article;
use App\Like;
use App\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function store(Request $request,$id, Article $article)
    {
      $like = new Like();
      $article = Article::find($id);
      $user = \Auth::user();

      $like->user_id = $user->id;
      $like->article_id = $article->id;
      $like->save();
      return back();
    }

    public function destroy($id)
    {
      \Auth::user()->unlike($id);
      return back();
    }

    public function showFlash($id)
    {
      session()->flash('flash_message','ログインしてください');
      return back();
    }
}
