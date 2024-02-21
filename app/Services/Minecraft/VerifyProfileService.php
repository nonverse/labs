<?php

namespace App\Services\Minecraft;

use App\Contracts\Repository\Minecraft\MinecraftProfileRepositoryInterface;

class VerifyProfileService
{
    private MinecraftProfileRepositoryInterface $profileRepository;

    public function __construct(
        MinecraftProfileRepositoryInterface $profileRepository
    )
    {
        $this->profileRepository = $profileRepository;
    }

    public function send() {

    }
}
