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
        return ['required', 'string', $pass->withMessage('A senha deve ter pelo menos 8 caracteres'), 'confirmed'];
    }
}
