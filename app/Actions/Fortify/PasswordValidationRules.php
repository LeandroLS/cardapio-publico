<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        $pass = new Password;
        $pass->length(6);
        $pass->withMessage('A senha deve ter pelo menos 6 caracteres');
        return ['required', 'string', $pass, 'confirmed'];
    }
}
