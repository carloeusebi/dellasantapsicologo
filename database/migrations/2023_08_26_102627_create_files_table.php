<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Storage::makeDirectory('uploads');
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id', unsigned: true);
            $table->string('name', 80);
            $table->string('type', 4);
            $table->string('path', 80);
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Storage::deleteDirectory('uploads');
        Schema::dropIfExists('files');
    }
};
