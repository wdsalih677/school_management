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
        Schema::create('stu_parents', function (Blueprint $table) {
            $table->id();

            $table->string('email')->unique();
            $table->string('password');

            $table->string('fa_name');
            $table->string('mo_name');

            $table->string('fa_job');
            $table->string('mo_job');

            $table->string('fa_passport_id')->nullable();
            $table->string('mo_passport_id')->nullable();

            $table->bigInteger('fa_national_id');
            $table->bigInteger('mo_national_id');

            $table->bigInteger('fa_phone');
            $table->bigInteger('mo_phone');

            $table->bigInteger('fa_blood_id')->unsigned();
            $table->foreign('fa_blood_id')->references('id')->on('bloods')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('mo_blood_id')->unsigned();
            $table->foreign('mo_blood_id')->references('id')->on('bloods')->onUpdate('cascade')->onDelete('cascade');
            
            $table->bigInteger('fa_nationality_id')->unsigned();
            $table->foreign('fa_nationality_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('mo_nationality_id')->unsigned();
            $table->foreign('mo_nationality_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('fa_religion_id')->unsigned();
            $table->foreign('fa_religion_id')->references('id')->on('religions')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('mo_religion_id')->unsigned();
            $table->foreign('mo_religion_id')->references('id')->on('religions')->onUpdate('cascade')->onDelete('cascade');

            $table->text('fa_address');
            $table->text('mo_address');
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
        Schema::dropIfExists('stu_parents');
    }
};
