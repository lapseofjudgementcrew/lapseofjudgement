<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller {


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('session.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'yppname' => 'required', 'password' => 'required',
		]);

		$credentials = $request->only('yppname', 'password');

		if (Auth::attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended();
		}

		return redirect()->route('session.create')
					->withInput($request->only('yppname', 'remember'))
					->withErrors('Invalid Credentials.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return view('session.destroy');
	}

	public function getchangepassword(){
		return view('session.change-password');
	}
	public function postchangepassword(Request $request){
		$this->validate($request, [
			'current_password' => 'required|password', 
			'password' => 'required|min:6',
			'password_confirmation' => 'required|same:password'
		]);

		$user = \Auth::user();
		$user->password = \Hash::make($request['password']);
		if($user->save()){
			$message = 'You successfully logged in';
			return redirect('home');
		}
		else{
			
		}
	}

}
