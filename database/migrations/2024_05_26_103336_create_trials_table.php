<?php

use App\Models\Canal;
use App\Models\Client;
use App\Models\TrialState;
use App\Models\User;
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
        Schema::create('trials', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TrialState::class);
            $table->float('importoTot')->nullable();
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(Canal::class);
            $table->foreignIdFor(User::class);
            $table->date('dataFinalizzatoReso')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trials');
    }
};
