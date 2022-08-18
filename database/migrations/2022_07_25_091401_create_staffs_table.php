<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('staff_name', 50);
            $table->string('staff_surname', 50);
            $table->string('staff_phone', 50)->nullable();
            $table->string('staff_email', 50);
            $table->string('staff_avatar')->nullable();
            $table->string('staff_adress')->nullable();
            $table->string('staff_code')->nullable();
=======
            $table->string('avatar');
            $table->string('staff_code');
            $table->string('staff_name');
            $table->string('staff_surname');
            $table->date('staff_dob');
            $table->string('staff_pob');
            $table->text('staff_adress');
            $table->string('staff_phone');
            $table->string('staff_email')->unique();
            $table->string('staff_ville');
            $table->string('staff_postal');
            $table->string('staff_sexe');
            $table->string('staff_country');
>>>>>>> b12ca21f5cef66280b75f28081d5a31cd7f03c7d
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
