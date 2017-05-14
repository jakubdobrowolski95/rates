<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function(Blueprint $table) {
		$table->increments('id');
		$table->integer('waluta_id');
		$table->date('data_tabeli');
		$table->float('kurs');
		$table->float('zmiana');
		$table->string('nazwa_tabeli');
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
        //
    }
}
