<?php

namespace cue;

use Illuminate\Database\Eloquent\Model;


class Card extends Model
{
  protected $fillable = [
      'user_id', 'category_id', 'front', 'back', 'known', 'created_at',
  ];


  public function userCard()
    {
        return $this->belongsToMany('cue\User');
    }




  // public function ()
  //   {
  //       return $this->belongsTo('cue\User');
  //   }

}
