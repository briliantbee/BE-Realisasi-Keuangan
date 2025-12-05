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
        Schema::create('note_follow_ups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('note_id')->constrained('notes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('user_id')->constrained('users')->onUpdate('cascade');
            $table->string('title');
            $table->dateTime('target_date');
            $table->enum('status', ['progress', 'finish']);
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
        Schema::dropIfExists('note_follow_ups');
    }
};
