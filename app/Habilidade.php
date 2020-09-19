<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class habilidade extends Model
{
    public function users ()
    {
        return $this->belongsToMany(User::class);
    }

    public function trabalhos ()
    {
        return $this->belongsToMany(Trabalho::class);
    }

    protected $fillable = [
        'nome', 'slug', 'visibilidade',
    ];
}
