<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_equipment', function (Blueprint $table)
        {
        //=======> Information
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('equipment_id');

        //=======> Configs
            $table->primary(['provider_id', 'equipment_id']);
            
            $table->foreign('provider_id')
                    ->references('id')
                    ->on('providers')
                    ->onDelete('cascade');
            
            $table->foreign('equipment_id')
                ->references('id')
                ->on('equipments')
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
        Schema::dropIfExists('provider_equipment');
    }
}
