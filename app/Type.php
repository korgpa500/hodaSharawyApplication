<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $primaryKey = "type_id";

    public function users()
    {
        return $this->hasMany('App\User');
    }

    protected $fillable = [
        'type_name',
    ];
}
