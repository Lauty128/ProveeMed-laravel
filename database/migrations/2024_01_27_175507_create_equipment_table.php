<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table)
        {
        //=======> Information
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->string('umdns')->nullable();
            $table->string('image', 150)->nullable();
            $table->string('description', 300)->nullable();
            $table->string('specifications', 30)->nullable();
            $table->integer('price')->nullable();
        //=======> Others 
            $table->timestamps();

        //=======> Configs 
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
}
