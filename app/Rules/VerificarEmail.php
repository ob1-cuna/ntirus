<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VerificarEmail implements Rule
{

    public function passes($attribute, $value)
    {
        return $value == auth()->user()->email;
    }

    public function message()
    {
        return 'Email incorrecto, tente novamente.';
    }
}
