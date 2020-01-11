<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user()
    {
      return $this->belongsTO('App\User');
    }

    public function like_users()
    {
      return $this->belongsToMany(User::class,'likes2','article_id','user_id')->withTimestamps();
    }
}
