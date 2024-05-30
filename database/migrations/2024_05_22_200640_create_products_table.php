<?php

use App\Models\ProductList;
use App\Models\ProductState;
use App\Models\Shop;
use App\Models\Trial;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('matricola');
            $table->foreignIdFor(ProductList::class);
            $table->foreignIdFor(ProductState::class);
            $table->foreignIdFor(Shop::class);
            $table->foreignIdFor(Trial::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
