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
        Schema::create('program_activities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('priority_program_id')->constrained('params')->onUpdate('cascade');
            $table->string('name');
            $table->bigInteger('target');
            $table->foreignUuid('unit_id')->constrained('params')->onUpdate('cascade');
            $table->bigInteger('budget');
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
        Schema::dropIfExists('program_activities');
    }
};
