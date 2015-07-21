<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Increase the size of the identifier
            $table->bigIncrements('id')->change();

            // Add a reference to the "party" table
            $table->bigInteger('party_id')->unsigned()->index();

            // These columns will now be handled through the associated "party"
            $table->dropColumn('name');
            $table->dropColumn('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Decrease the size of the identifier
            $table->increments('id')->change();

            // Remove the reference to the "party" table
            $table->dropColumn('party_id');

            // Re-add the original fields
            $table->string('name');
            $table->string('email')->unique();
        });
    }
}
