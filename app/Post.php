<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = "post_id";

    protected $fillable = [
        'post_title',
        'post_body',
        'post_image',
        'section_id',
        'user_id'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }
}
