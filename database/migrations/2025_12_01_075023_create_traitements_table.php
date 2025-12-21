<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('traitements', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('patient_id')
                ->constrained('users')
                ->cascadeOnDelete();
        
            $table->foreignId('medecin_id')
                ->constrained('users')
                ->cascadeOnDelete();
        
            $table->string('nom_medicament');
            $table->string('dosage');
            $table->time('heure_prise');
            $table->boolean('important')->default(false);
            $table->boolean('pris')->default(false);
        
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traitements');
    }
};
