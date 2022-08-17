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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('staff_name', 50);
            $table->string('staff_surname', 50);
            $table->string('staff_phone', 50)->nullable();
            $table->string('staff_email', 50);
            $table->string('staff_avatar')->nullable();
            $table->string('staff_adress')->nullable();
            $table->string('staff_code')->nullable();
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
};
