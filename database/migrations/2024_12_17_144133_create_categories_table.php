<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('_lft');
            $table->integer('_rgt');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('image')->nullable();
            $table->integer('position')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('show_menu')->default(1);
            $table->tinyInteger('show_home')->default(1);
            $table->text('desc')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('categories')->onUpdate('NO ACTION')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['parent_id']);
        });
        Schema::dropIfExists('categories');
    }
};