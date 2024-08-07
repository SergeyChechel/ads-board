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
        Schema::create('ad_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ad_id')->constrained()->index()->name('ad_images_ad_id_foreign'); // Внешний ключ и индекс на ad_id
            $table->integer('pic_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->string('tags')->nullable();
            $table->dateTime('upload_date');
            $table->string('dimensions', 20)->nullable();
            $table->string('source')->nullable();
            $table->enum('status', ['published', 'pending', 'deleted'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_images');
    }
};
