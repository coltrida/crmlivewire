<?php

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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->boolean('setConfiguration')->default(false);
            $table->string('companyName');
            $table->string('piva');
            $table->string('companyAddress');
            $table->string('companyCity');
            $table->string('companyPr');
            $table->string('companyCountry');
            $table->string('companyEmail');
            $table->string('warehouse');
            $table->string('companyPec')->nullable();
            $table->string('primaryColor')->nullable();
            $table->string('secondaryColor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
