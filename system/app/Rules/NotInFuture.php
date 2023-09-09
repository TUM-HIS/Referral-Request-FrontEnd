<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class NotInFuture implements Rule
{
    public function passes($attribute, $value)
    {
        // Parse the input date using Carbon
        $inputDate = Carbon::parse($value);

        // Compare the parsed input date with today's date
        return $inputDate->lte(Carbon::today());
    }

    public function message()
    {
        return 'The :attribute must not be a future date.';
    }
}
