<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */

    public function up()
    {
        Schema::create('status', function (Blueprint $table) {               $table->increments('id');               $table->string('code')   ;               $table->string('description')->nullable()   ;               $table->timestamps();            $table->string('slug');             $table->softDeletes();            $table->unique('slug');

     });
    }
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
         Schema::dropIfExists('status');
    }

}

