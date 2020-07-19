<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review_trab extends Model
{
    protected $guarded = [];
    public function trabalho ()
    {
        return $this->belongsTo(Trabalho::class);
    }
}
