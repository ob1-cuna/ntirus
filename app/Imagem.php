<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagem extends Model
{
    public function imagemable()
    {
        return $this->morphTo();
    }
}
