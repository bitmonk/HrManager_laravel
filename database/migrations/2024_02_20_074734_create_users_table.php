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
            $table->foreignId('blood_group_id')->constrained('blood_groups')->nullable();
            $table->string('health_condition',255)->nullable();
            $table->foreignId('position_id')->constrained('positions')->nullable();
            $table->foreignId('level_id')->constrained('levels')->nullable();
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
