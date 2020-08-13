<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodosDePagamento extends Model
{
    public function users ()
    {
        return $this->belongsToMany(User::class);
    }

    public function trabalhos ()
    {
        return $this->belongsToMany(Trabalho::class);
    }
}
