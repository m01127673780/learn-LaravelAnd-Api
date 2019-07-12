<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
use  SoftDeletes;

      protected $fillable = ['title', 'user_id', 'desc', 'content', 'status'];
      protected $date = ['delete_at'];
  }
 
