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
            $table->string('name',20);
            $table->string('last_name',20);
            $table->date('date_of_birth')->nullable();
            $table->string('email',50)->unique();
            $table->string('phone1',11)->nullable();
            $table->string('phone2',11)->nullable();
            $table->integer('blood_group_id')->nullable();
            $table->string('health_condition',255)->nullable();
            $table->integer('position_id')->nullable();
            $table->integer('level_id')->nullable();
            $table->binary('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('join_date')->default(now());
            

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
