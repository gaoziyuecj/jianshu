<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded; //不可能注入的字段
    protected $fillable = ['title', 'content']; //可以注入的数据字段
}
