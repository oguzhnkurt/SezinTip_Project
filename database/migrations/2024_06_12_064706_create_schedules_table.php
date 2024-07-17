<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
{
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();
        $table->string('monday_time')->nullable();
        $table->string('monday_link')->nullable();
        $table->string('tuesday_time')->nullable();
        $table->string('tuesday_link')->nullable();

        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
