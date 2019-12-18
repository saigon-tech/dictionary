<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWordtypeDictonary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_wordtype', function (Blueprint $table) {
            $table->Increments('wordtype_id');
            $table->string('wordtype_name');
            $table->text('wordtype_desc');
            $table->integer('wordtype_status');
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
        Schema::dropIfExists('tbl_wordtype');
    }
}
