<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use phpseclib3\Crypt\RSA;

class MinecraftServerKeys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'labs:mc-keys';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create RSA keys to communicate with Minecraft servers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $publicKey = './storage/labs:mc:xs-public.key';
        $privateKey = './storage/labs:mc:xs-private.key';

        $key = RSA::createKey(4096);

        file_put_contents($publicKey, (string)$key->getPublicKey());
        file_put_contents($privateKey, (string)$key);

        return Command::SUCCESS;
    }
}
