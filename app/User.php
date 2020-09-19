<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public function habilidades ()
    {
        return $this->belongsToMany(Habilidade::class)
            ->withTimestamps()
            ->withPivot('classificacao');
    }
    public function metodos_de_pagamento ()
    {
        return $this->belongsToMany(MetodosDePagamento::class)
            ->withTimestamps();
    }

    public function propostas ()
    {
        return $this->hasMany(Proposta::class);
            //->withTimestamps()
            //->withPivot('preco_proposta', 'tempo_exec');
    }

    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }

    public function transacao()
    {
        return $this->hasOne(Transacao::class);
    }

    public function transacoes()
    {
        return $this->hasMany(Transacao::class);
    }

    public function trabalho()
    {
        return $this->hasOne(Trabalho::class,'freelancer_id', 'id');
    }

    public function trabalhos_frees()
    {
        return $this->hasMany(Trabalho::class,'freelancer_id', 'id');
    }

    public function trabalhos_cliente()
    {
        return $this->hasMany(Trabalho::class);
    }

    public function experiencia()
    {
        return $this->hasMany(Expereduca::class);
    }

    public function imagems()
    {
        return $this->morphMany(Imagem::class, 'imagemable');
    }

    public function fotoPerfil()
    {
        return $this->morphMany(Imagem::class, 'imagemable');
    }

    public function review_trabs ()
    {
        return $this->hasMany(Review_trab::class, 'avaliado_id', 'id');
    }


    protected $fillable = [
        'name', 'email', 'password', 'd_nascimento', 'is_permission',
    ];

    protected $dates = [
        'd_nascimento',
    ];

    public function getDNascimentoAttribute ($data)
    {
        return Carbon::parse($data)->format('Y-m-d');
    }

    public function getCreatedAtAttribute ($data)
    {
        return Carbon::parse($data)->format('d-m-Y');
    }


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
