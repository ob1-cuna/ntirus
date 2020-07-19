<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Expereduca extends Model

{
    protected $guarded = [];
    public function getDataInicioAttribute ($data)
    {
        return Carbon::parse($data)->format('M Y');
    }

    public function getDataTerminioAttribute ($data)
    {
        return Carbon::parse($data)->format('M Y');
    }

    public function getDataInicioAttribute2 ($data)
    {
        return Carbon::parse($data)->format('Y-m-d');
    }
}
