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
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname', 100)->nullable();
            $table->string('middlename', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->date('birthday')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id', 'users_role_id_foreign')->references('id')->on('roles')->onDelete('set null');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->default('active');
            $table->timestamp('last_login')->nullable();

            // Add indexes with explicit names
            $table->index('lastname', 'users_lastname_index');
            $table->index('email_verified_at', 'users_email_verified_at_index');
            $table->index('role_id', 'users_role_id_foreign_index');
            $table->index('created_at', 'users_created_at_index');
            $table->index('updated_at', 'users_updated_at_index');
            $table->index('address', 'users_address_index');
            $table->index('phone', 'users_phone_index');
            $table->index('status', 'users_status_index');
            $table->index('last_login', 'users_last_login_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the foreign key constraint using the correct name
            $table->dropForeign('users_role_id_foreign');
            $table->dropIndex('users_lastname_index');
            $table->dropIndex('users_email_verified_at_index');
            $table->dropIndex('users_role_id_foreign_index');
            $table->dropIndex('users_created_at_index');
            $table->dropIndex('users_updated_at_index');
            $table->dropIndex('users_address_index');
            $table->dropIndex('users_phone_index');
            $table->dropIndex('users_status_index');
            $table->dropIndex('users_last_login_index');
            $table->dropColumn([
                'firstname', 'middlename', 'lastname', 'birthday', 'role_id', 
                'address', 'phone', 'status', 'last_login'
            ]);
        });
    }
};
