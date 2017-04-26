<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
