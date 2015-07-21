<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailAddressesTable extends Migration {

	public function up()
	{
		Schema::create('email_addresses', function(Blueprint $table) {
			$table->bigIncrements('id');

            $table->bigInteger('party_id')->unsigned()->index();

			$table->string('address');
		});
	}

	public function down()
	{
		Schema::drop('email_addresses');
	}
}
