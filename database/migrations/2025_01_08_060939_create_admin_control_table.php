<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_control', function (Blueprint $table) {
            $table->id(); // Equivalent to an auto-incrementing INT primary key
            $table->string('setting_name'); // Setting name as a string
            $table->string('value')->nullable(); // Setting value as a nullable string
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_control');
    }
};
