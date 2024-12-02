<?php

namespace Modules\Wallet\App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckWalletBalance implements ValidationRule
{
    public function __construct(public mixed $currentBalance) {}
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value > $this->currentBalance) {
            $fail('المبلغ المطلوب غير متوفر في حسابك!');
        }
    }
}