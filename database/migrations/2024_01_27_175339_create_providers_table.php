<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table)
        {
        //=======> Information
            $table->id();
            $table->string('name', 80);
            $table->string('image', 20)->nullable();
            $table->string('web', 100)->nullable();
            $table->string('mail', 100)->nullable();
            $table->string('phone', 40)->nullable();
            $table->boolean('available')->default(true);
        //=======> Location
            $table->string('province_id', 10);
            $table->string('province', 60);
            $table->string('city_id', 10);
            $table->string('city', 50);
            $table->string('department_id', 10);
            $table->string('address', 100)->nullable();
        //=======> Others
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
        Schema::dropIfExists('providers');
    }
}
