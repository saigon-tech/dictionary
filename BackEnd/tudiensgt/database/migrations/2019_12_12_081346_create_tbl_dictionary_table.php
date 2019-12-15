<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDictionaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dictionary', function (Blueprint $table) {
            $table->Increments('dictionary_id');
            $table->text('dictionary_name_eng');
            $table->text('dictionary_name_vn');
            $table->text('dictionary_desc');
            $table->string('dictionary_image');
            $table->integer('dictionary_status');
            $table->integer('alphabet_id');
            $table->integer('wordtype_id');
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
        Schema::dropIfExists('tbl_dictionary');
    }
}
