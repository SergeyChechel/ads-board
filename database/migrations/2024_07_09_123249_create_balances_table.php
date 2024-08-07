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
        Schema::create('balances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->index()->name('balances_user_id_foreign');
            $table->decimal('amount', 9, 2);
            $table->string('comment')->nullable();
            
            $table->timestamp('created_at')->useCurrent()->index();
            $table->timestamp('updated_at')->nullable()->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balances');
    }
};
