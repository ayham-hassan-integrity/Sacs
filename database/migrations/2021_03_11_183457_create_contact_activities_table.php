<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactActivitiesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */

    public function up()
    {
        Schema::create('contact_activities', function (Blueprint $table) {               $table->increments('id');               $table->unsignedInteger('contact_id')   ;               $table->unsignedInteger('type_id')   ;               $table->unsignedInteger('outcome_id')   ;               $table->date('activity_date')   ;               $table->string('details')->nullable()   ;               $table->timestamps();             $table->softDeletes();
            $table->foreign('contact_id')
            ->references('id')
            ->on('contacts')
            ->onDelete('cascade');            $table->foreign('type_id')
            ->references('id')
            ->on('types')
            ->onDelete('cascade');            $table->foreign('outcome_id')
            ->references('id')
            ->on('outcomes')
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
         Schema::dropIfExists('contact_activities');
    }

}

