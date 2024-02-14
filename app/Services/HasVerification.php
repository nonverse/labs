<?php

namespace App\Services;

use Carbon\CarbonImmutable;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Throwable;

trait HasVerification
{

    /**
     * @param int $length
     * @return string
     * @throws Throwable
     */
    public function createVerifier(int $length = 6): string
    {
        $code = Str::random($length);
        $this->verifier = Hash::make($code);
        $this->saveOrFail();

        return $code;
    }


    /**
     * @param string $code
     * @return void
     * @throws Throwable
     */
    public function verify(string $code): void
    {
        if (Hash::check($code, $this->verifier)) {
            $this->verified_at = CarbonImmutable::now();
            $this->verifier = null;
            $this->saveOrFail();
        } else {
            throw new Exception('Incorrect code');
        }
    }
}
