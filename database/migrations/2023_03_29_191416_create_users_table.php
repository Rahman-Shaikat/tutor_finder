<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_tutor') -> default(0);
            $table->binary('image')-> nullable();
            $table->string('name')-> nullable();
            $table->string('gender')-> nullable();
            $table->string('district')-> nullable();
            $table->string('area')-> nullable();
            $table->string('address')-> nullable();
            $table->string('postcode')-> nullable();
            $table->string('medium')-> nullable();
            $table->string('class')-> nullable();
            $table->string('institution')-> nullable();
            $table->string('tutorgender')-> nullable();
            $table->string('email')->unique()-> nullable();
            $table->string('phone')->unique()-> nullable();
            $table->binary('tutor_cv')-> nullable();
            $table->string('password')-> nullable();
            $table->boolean('is_admin')-> default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
