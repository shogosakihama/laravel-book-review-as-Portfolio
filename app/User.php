<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likes()
    {
        return $this->belongsToMany(Article::class,'likes2','user_id','article_id')->withTimestamps();
    }

    public function like($articleId)
    {
      $exist = $this->is_like($articleId);

      if($exist){
        return false;
      }else{
        $this->like()->attach($articleId);
        return true;
      }
    }
    
    public function unlike($articleId)
    {
      $exist = $this->is_like($articleId);
      
      if($exist){
        $this->likes()->detach($articleId);
        return true;
      }else{
        return false;
      }
    }

    public function is_like($articleId)
    {
      return $this->likes()->where('article_id',$articleId)->exists();
    }

}
