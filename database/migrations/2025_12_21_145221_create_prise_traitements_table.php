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
       Schema::create('prise_traitements', function (Blueprint $table) {
        $table->id();

        $table->foreignId('traitement_id')
            ->constrained('traitements')
            ->cascadeOnDelete();

        $table->time('heure');
        $table->boolean('pris')->default(false);

        $table->timestamps();
        }   );
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prise_traitements');
    }
};
