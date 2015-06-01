<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTypeToUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('users', function( Blueprint $table ){
                $table->enum('user_type', ['Super Admin', 'Admin', 'User', 'Provider']);
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
             Schema::table( 'users', function( Blueprint $table ){
                $table->dropColumn('user_type'); 
             });
	}

}
