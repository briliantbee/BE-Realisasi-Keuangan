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
        Schema::create('program_acitivty_executors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('program_activity_id')->constrained('program_activities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('executor_id')->constrained('params')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_acitivty_executors');
    }
};
