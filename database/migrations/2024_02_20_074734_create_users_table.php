<?php

use App\Models\User;
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
            $table->unsignedBigInteger('blood_group_id')->nullable();
            // ->constrained('blood_groups')->nullable();
            $table->string('health_condition',255)->nullable();
            $table->unsignedBigInteger('position_id')->nullable();          // ->constrained('positions')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();      // ->constrained('levels')->nullable();
            $table->binary('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('join_date')->nullable();
            $table->foreign('blood_group_id')
                ->references('id')
                ->on('blood_groups');
            $table->foreign('position_id')
                ->references('id')
                ->on('positions');
            $table->foreign('level_id')
                ->references('id')
                ->on('levels');
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
