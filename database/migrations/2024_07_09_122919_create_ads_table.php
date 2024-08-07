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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('content');
            $table->foreignId('user_id')->constrained()->index(); // Внешний ключ и индекс на user_id
            $table->boolean('is_verified')->default(false);
            $table->string('reject_reason')->nullable();
            
            // Явное имя для внешнего ключа и индекса на chat_id
            $table->unsignedBigInteger('chat_id')->nullable();
            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('set null')->name('ads_chat_id_foreign');

            // Явное имя для внешнего ключа и индекса на category_id
            $table->foreignId('category_id')->constrained()->index()->name('ads_category_id_foreign');

            // Явное имя для внешнего ключа и индекса на manager_verificator_id
            $table->foreignId('manager_verificator_id')->constrained('users')->index()->name('ads_manager_verificator_id_foreign');

            $table->string('location')->nullable();
            $table->integer('status')->default(1);
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('url', 500)->nullable();
            $table->string('relative_urls')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
