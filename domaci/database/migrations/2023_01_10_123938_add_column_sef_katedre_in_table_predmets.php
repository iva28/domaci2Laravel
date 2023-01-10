<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('predmets', function (Blueprint $table) {
            $table->after('opis', function($table) {
                $table->string('sef_katedre');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('predmets', function (Blueprint $table) {
            $table->dropColumn('sef_katedre');
        });
    }
};
