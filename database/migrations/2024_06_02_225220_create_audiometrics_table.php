<?php

use App\Models\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audiometrics', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class);
            $table->integer('s250')->nullable();
            $table->integer('s500')->nullable();
            $table->integer('s1000')->nullable();
            $table->integer('s2000')->nullable();
            $table->integer('s6000')->nullable();
            $table->integer('s8000')->nullable();
            $table->integer('d250')->nullable();
            $table->integer('d500')->nullable();
            $table->integer('d1000')->nullable();
            $table->integer('d2000')->nullable();
            $table->integer('d6000')->nullable();
            $table->integer('d8000')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audiometrics');
    }
};
