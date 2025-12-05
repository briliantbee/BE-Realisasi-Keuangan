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
        Schema::create('honors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('satker_code')->index();
            $table->bigInteger('value');
            $table->bigInteger('data_target');
            $table->bigInteger('data_input');
            $table->bigInteger('realization_value');
            $table->bigInteger('paid');
            $table->date('date');
            $table->timestamps();
        });

        Schema::table('honors', function (Blueprint $table) {
            $table->foreign('satker_code')->references('satker_code')->on('provinces')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('honors');
    }
};
