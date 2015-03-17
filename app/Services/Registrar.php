<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
<<<<<<< HEAD
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
=======
			'yppname' => 'required|unique:users|max:255',
>>>>>>> 65fe0eacb71f147afea95697745eab2a33d8a9d7
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
<<<<<<< HEAD
			'name' => $data['name'],
			'email' => $data['email'],
=======
			'yppname' => $data['yppname'],
>>>>>>> 65fe0eacb71f147afea95697745eab2a33d8a9d7
			'password' => bcrypt($data['password']),
		]);
	}

}
