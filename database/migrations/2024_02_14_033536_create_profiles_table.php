<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('minecraft')->create('profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->uuid('mc_uuid');
            $table->string('username');
            $table->string('verifier');
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('minecraft')->dropIfExists('profiles');
    }
};
