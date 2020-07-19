<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    protected $guarded = [];


    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function trabalho ()
    {
        return $this->belongsTo(Trabalho::class);
    }
}
