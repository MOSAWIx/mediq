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
        Schema::table('traitements', function (Blueprint $table) {
            $table->integer('fois_par_jour')->after('dosage');
            $table->integer('duree_jours')->after('fois_par_jour');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('traitements', function (Blueprint $table) {
            $table->dropColumn(['fois_par_jour', 'duree_jours']);
        });
    }
};
