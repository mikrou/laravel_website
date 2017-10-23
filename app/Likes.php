<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'blog_id', 'user_id'
  ];
}
