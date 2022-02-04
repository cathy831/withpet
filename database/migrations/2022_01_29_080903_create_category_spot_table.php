<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySpotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_spot', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsinged();
            $table->bigInteger('spot_id')->unsinged();
            $table->primary(['category_id', 'spot_id']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_spot');
    }
}
