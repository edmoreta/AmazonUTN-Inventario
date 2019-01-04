<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Lang;

class StrongPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[!$%&?@#\._-])(?=.*[0-9])[\w!$%&?@#\.-]{8,25}$/', $value);
    
    
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return Lang::get('validation.strong_password');
    }
}
