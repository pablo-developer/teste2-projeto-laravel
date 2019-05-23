<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {        
            $table->Increments('id');
            $table->string('carChassi',150)->unique();
            $table->string('carPlaca',150);
            $table->string('carDescricao',150);
            $table->string('carPathImagem',150);
            $table->string('marcaID',150)->references('id')->on('marcas');
            $table->string('corID',150)->references('id')->on('cores');
            $table->char('carStatus');
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
        Schema::dropIfExists('cars');
    }
}
