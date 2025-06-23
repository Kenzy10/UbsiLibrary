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
        Schema::create('libraries', function (Blueprint $table) {
           $table->id();
            $table->string('nim');
            $table->string('name');
            $table->string('class');
            $table->string('booktitle');
            $table->string('author');
            $table->date('date');
            $table->date('return_date')->nullable();
            $table->string('teacher');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libraries');
    }
};
