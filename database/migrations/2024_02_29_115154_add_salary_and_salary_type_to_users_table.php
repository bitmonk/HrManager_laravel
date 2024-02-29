<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('salary', 8, 2)->nullable(); // Assuming salary is a decimal
            // $table->string('salary_type', 50)->nullable(); 
            $table->unsignedBigInteger('salary_type')->nullable();
            $table->foreign('salary_type')->references('id')->on('salarys')->onDelete('set null');


        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['salary', 'salary_type']);
        });
    }
};
