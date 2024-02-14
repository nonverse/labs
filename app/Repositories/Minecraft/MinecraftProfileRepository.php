<?php

namespace App\Repositories\Minecraft;

use App\Models\Minecraft\Profile;
use Illuminate\Container\EntryNotFoundException;
use Illuminate\Database\Eloquent\Model;

class MinecraftProfileRepository extends \App\Repositories\Repository implements \App\Contracts\Repository\Minecraft\MinecraftProfileRepositoryInterface
{

    public function model(): string
    {
        return Profile::class;
    }
}
