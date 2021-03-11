<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */

    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {               $table->increments('id');               $table->string('image')->nullable()   ;               $table->string('name')   ;               $table->unsignedInteger('customer_id')   ;               $table->unsignedInteger('status_id')   ;               $table->string('email')   ;               $table->string('web_sit')->nullable()   ;               $table->string('phone')->nullable()   ;               $table->string('mobile')->nullable()   ;               $table->string('fax')->nullable()   ;               $table->string('details')->nullable()   ;               $table->timestamps();            $table->string('slug');             $table->softDeletes();            $table->unique('slug');
            $table->foreign('customer_id')
            ->references('id')
            ->on('customers')
            ->onDelete('cascade');            $table->foreign('status_id')
            ->references('id')
            ->on('status')
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
         Schema::dropIfExists('contacts');
    }

}

