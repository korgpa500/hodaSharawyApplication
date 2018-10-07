<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = "register";

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'type_id', 'section_id', 'read',
    ];
}
