<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabalho extends Model
{
        protected $guarded = [];

    public function habilidades ()
    {
        return $this->belongsToMany(Habilidade::class)
            ->withTimestamps();
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function review_trabs ()
    {
        return $this->hasMany(Review_trab::class, 'id_trabalho');
    }

    public function freelancer ()
    {
        return $this->belongsTo(User::class, 'freelancer_id');
    }


    public function propostas ()
    {
        return $this->hasMany(Proposta::class);
    }

    public function transacao ()
    {
        return $this->hasMany(Transacao::class);
    }

    public function imagems()
    {
        return $this->morphMany(Imagem::class, 'imagemable');
    }
}
