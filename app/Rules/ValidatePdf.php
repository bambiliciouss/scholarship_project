<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Spatie\PdfToText\Pdf;

class ValidatePdf implements Rule
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
        $text = Pdf::getText($value);
        return strpos($text, 'Valid') !== false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid PDF file.';
    }
}
