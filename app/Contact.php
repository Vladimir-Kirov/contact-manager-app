<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'company', 'email', 'phone', 'address', 'group_id', 'photo'];

    public function group()
    {
        return $this->belongsTo('App\Group', 'group_id');
    }
}
