<?php

use Illuminate\Console\View\Components\Task;
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
        Schema::create('monevs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('program_activity_id')->constrained('program_activities')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->bigInteger('target');
            $table->bigInteger('realization');
            $table->foreignUuid('unit_id')->constrained('params')->onUpdate('cascade');
            $table->text('narasi');
            $table->text('constraint');
            $table->text('solution');
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
        Schema::dropIfExists('monevs');
    }
};
