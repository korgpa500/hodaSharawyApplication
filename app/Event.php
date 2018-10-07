<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = "event_id";

    protected $fillable = [
        'event_title',
        'event_body',
        'event_image',
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
}
