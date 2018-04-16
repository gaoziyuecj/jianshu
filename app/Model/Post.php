<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded; //不可能注入的字段
    protected $fillable = ['title', 'content','user_id']; //可以注入的数据字段

    /**
     * 文章所属用户
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
