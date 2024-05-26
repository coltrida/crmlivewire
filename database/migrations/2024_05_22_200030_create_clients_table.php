<?php

use App\Models\Codeclient;
use App\Models\Shop;
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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('province')->nullable();
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->foreignIdFor(Codeclient::class)->nullable();
            $table->foreignIdFor(Shop::class);
            $table->string('fullname');
            $table->string('fullnamereverse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
