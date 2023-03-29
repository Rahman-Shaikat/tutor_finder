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
            $table->boolean('is_tutor');
            $table->binary('image');
            $table->string('name');
            $table->string('gender');
            $table->string('district');
            $table->string('area');
            $table->string('address');
            $table->string('postcode');
            $table->string('medium');
            $table->string('class');
            $table->string('institution');
            $table->string('tutorgender');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->binary('tutor_cv');
            $table->string('password');

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
