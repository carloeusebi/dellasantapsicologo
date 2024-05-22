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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 80);
            $table->string('lname', 80);
            $table->string('sex', 1)->nullable();
            $table->date('birthday')->nullable();
            $table->string('birthplace', 80)->nullable();
            $table->string('address', 150)->nullable();
            $table->char('codice_fiscale', 16)->nullable();
            $table->date('begin')->nullable();
            $table->string('email', 80)->nullable();
            $table->string('phone', 20)->nullable();
            $table->smallInteger('weight', unsigned: true)->nullable();
            $table->tinyInteger('height', unsigned: true)->nullable();
            $table->string('qualification', 80)->nullable();
            $table->string('job', 50)->nullable();
            $table->text('cohabitants')->nullable();
            $table->text('drugs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
