<?php

namespace App\Providers;

use App\Contracts\Repository\Minecraft\MinecraftProfileRepositoryInterface;
use App\Contracts\Repository\RefreshTokenRepositoryInterface;
use App\Contracts\Repository\RepositoryInterface;
use App\Contracts\Repository\UserRepositoryInterface;
use App\Repositories\Minecraft\MinecraftProfileRepository;
use App\Repositories\RefreshTokenRepository;
use App\Repositories\Repository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, Repository::class);
        $this->app->bind(RefreshTokenRepositoryInterface::class, RefreshTokenRepository::class);
        $this->app->bind(MinecraftProfileRepositoryInterface::class, MinecraftProfileRepository::class);
    }
}
