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
        Schema::create('params', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('parent_id')->nullable();
            $table->string('category');
            $table->string('param');
            $table->integer('order')->nullable();
        });

        Schema::table('params', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('params')->onDelete('cascade')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
  public function down()
{
    // Hapus constraint self-relation dulu
    Schema::table('params', function (Blueprint $table) {
        $table->dropForeign(['parent_id']);
    });

    // Hapus tabel users foreign key dulu
    if (Schema::hasTable('users')) {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'unit_id')) {
                $table->dropForeign(['unit_id']);
            }
        });
    }

    Schema::dropIfExists('params');
}

};
