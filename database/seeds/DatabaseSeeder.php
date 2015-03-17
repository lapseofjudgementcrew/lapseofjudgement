<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

<<<<<<< HEAD
		// $this->call('UserTableSeeder');
=======
		$this->call('UserTableSeeder');
>>>>>>> 65fe0eacb71f147afea95697745eab2a33d8a9d7
	}

}
