<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartiesTable extends Migration {

	public function up()
	{
		Schema::create('parties', function(Blueprint $table) {
			$table->bigIncrements('id');

			$table->string('name_official');
			$table->string('name_short', 32)->nullable();
			$table->string('type')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('parties');
	}
}
