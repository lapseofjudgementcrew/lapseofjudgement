<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
<<<<<<< HEAD
			$table->string('yppname')->unique();
			$table->string('password', 60);
			$table->string('code')->unique();
			$table->integer('active');
			$table->rememberToken();
=======
			$table->string('yppname')->unique();			
			$table->string('password', 60)->nullable();
			$table->string('code')->unique()->nullable();
			$table->integer('activate')->nullable();
			$table->rememberToken()->nullable();
>>>>>>> 65fe0eacb71f147afea95697745eab2a33d8a9d7
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
		Schema::drop('users');
	}

}
