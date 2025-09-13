<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PartOfUrl implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        // return preg_match('/^[a-z0-9\-_]+$/i', $value);
        // return (bool) preg_match('/^[\p{L}\p{N}_-]+$/u', $value);
        return (bool) preg_match('/^[^\s\/?#@:&+=%<>\\\]+$/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return __('validation.custom.preg');
    }
}
