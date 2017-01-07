<?php

namespace cue;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

  protected $table = 'categories' ;
  protected $fillable = [
      'user_id', 'category_name', 'created_at',
  ];


  // public function cards()
  //   {
  //       return $this->hasManyThrough('cue\Card', 'cue\User' );
  //   }
}
