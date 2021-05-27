<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordInspectorRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Password must contain uppercase letters and numbers.';
    }
}
