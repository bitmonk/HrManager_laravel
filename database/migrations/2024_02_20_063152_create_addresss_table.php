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
        Schema::create('addresss', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('u_id');
            $table->string('district',555);
            $table->string('city',255);
            $table->string('tole',255);
            $table->string('ward_no');
            $table->string('zipcode',15);
            $table->string('zone',255);
            $table->enum('type',['Temporary','Permanent']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresss');
    }
};
