<?php

namespace cue;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use cue\Category;
use \Auth;

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
     * A user has many cards.
     *
     * @var array
     */

    public function card()
      {
          return $this->hasMany('cue\Card');
      }
    /**
     * A user has many category.
     *
     * @var array
     */

    public function category()
      {
          return $this->hasMany('cue\Category');
      }

    public function cards()
      {

        $user_id      = Auth::user();
        $category_id  = Auth::user()->category->pluck('id');
           //return $this->hasManyThrough('cue\Card', 'cue\Category', 'user_id', 'category_id', 'id' );

        return $this->belongsToMany('cue\Category', 'card', 'user_id', 'category_id');
      }



}
