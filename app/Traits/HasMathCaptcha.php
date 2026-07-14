<?php

namespace App\Traits;

trait HasMathCaptcha
{
    /**
     * Generate a new math captcha, store the answer in the
     * session, and return the two numbers to display.
     */
    protected function generateCaptcha(): array
    {
        $num1 = random_int(1, 12);
        $num2 = random_int(1, 12);

        session(['captcha_answer' => $num1 + $num2]);

        return ['num1' => $num1, 'num2' => $num2];
    }

    /**
     * Verify the submitted answer against the session value.
     * Always rotates the captcha afterward (pass or fail),
     * so a bot can't replay the same answer twice.
     */
    protected function verifyCaptcha($submittedAnswer): bool
    {
        $expected = session('captcha_answer');
        $isValid  = $expected !== null && (int) $submittedAnswer === (int) $expected;

        $this->generateCaptcha();

        return $isValid;
    }
}