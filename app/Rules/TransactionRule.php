<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TransactionRule implements Rule
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
        $stud = Studentinfo::where('user_id',Auth::id())->first();
        $student = Studentinfo::where('user_id',$stud->user_id)->first()->student_id;
        $existingTransaction = Transaction::where('student_id', $student)->where('applicationPeriod_id', $value)->first();

    return !$existingTransaction;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
