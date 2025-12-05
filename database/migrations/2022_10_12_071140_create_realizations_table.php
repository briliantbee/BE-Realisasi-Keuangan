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
        Schema::create('realizations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code');
            $table->bigInteger('budget');
            $table->bigInteger('aa');
            $table->bigInteger('budget_aa');
            $table->bigInteger('realization_spp');
            $table->bigInteger('sp2d');
            $table->date('date');
            $table->timestamps();
        });

        Schema::table('realizations', function (Blueprint $table) {
            $table->foreign('code')->references('code')->on('units')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realizations');
    }
};
