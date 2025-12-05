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
        Schema::create('padanan_data', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('segment')->unique();
            $table->foreignUuid('category_id')->constrained('params')->onUpdate('cascade');
            $table->foreignUuid('data_source_id')->constrained('params')->onUpdate('cascade');
            $table->bigInteger('non_jkn')->nullable();
            $table->bigInteger('jkn')->nullable();
            $table->bigInteger('active_jkn')->nullable();
            $table->bigInteger('not_active_jkn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('padanan_data');
    }
};
