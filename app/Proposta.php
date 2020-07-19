<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proposta extends Model
{
    protected $guarded = [];

    public function trabalho ()
    {
        return $this->belongsTo(Trabalho::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function imagems()
    {
        return $this->morphMany(Imagem::class, 'imagemable');
    }
}
