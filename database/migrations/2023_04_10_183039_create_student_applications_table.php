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
        Schema::create('student_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('tutor_id')->default(0);
            $table->integer('student_id')->default(0);
            $table->string('message')->nullable();
            $table->unsignedTinyInteger('status')->default(2)->comment('1 = accepted, 2 = pending, 3 = declined'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_applications');
    }
};
