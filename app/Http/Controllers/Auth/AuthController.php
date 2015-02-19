<?php namespace App\Http\Controllers\Auth;
use \Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'yppname' => 'required', 'password' => 'required',
		]);

		$credentials = $request->only('yppname', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
					->withInput($request->only('yppname', 'remember'))
					->withErrors([
						'yppname' => 'These credentials do not match our records.',
					]);
	}
	function getChangePassword(){
		return view('auth.changepassword');
	}
	function postChangePassword(Request $request){
		$current_password = $request['current_password'];
		$credentials = [
			'yppname' => Auth::user()->yppname,
			'password' => $current_password
		];
		if(Auth::validate($credentials)){
			$rules = array(
        
		        'password'         => 'required|min:6',
		        'password_confirmation' => 'required|same:password'           // required and has to match the password field
		   	);

    // do the validation ----------------------------------
    // validate against the inputs from our form
    		$validator = Validator::make(['password'=>$request['password'],'password_confirmation'=>$request['password_confirmation']], $rules);

    // check if the validator failed -----------------------
    		if ($validator->fails()) {

        // get the error messages from the validator
        		$messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        		return redirect('/auth/change-password')
            		->withErrors($validator);

    		} 
    		else {
        // validation successful ---------------------------

        // our duck has passed all tests!
        // let him enter the database

        // create the data for our duck
        		$user = Auth::user();
        		$user->password  = bcrypt($request['password']);
        		$user->save();

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        		return redirect('home')->with('message','Successfully changed password');
			}
		
		}
		else{
			return redirect('/auth/change-password')->withErrors('Invalid current password');
		}
	}

	function getActivate(){
		return view('auth.activate');
	}
	function postActivate(Request $request){
		$password = str_random(10);
		$user = User::where('code', '=', $request['code'])->first();
		if($user){
			$user->activate = 1;
			$user->password = bcrypt($password);
			//$user->code = '';
			$user->save();
			$message = 'Your temporary password is: '. $password;
			return redirect('/auth/login')->with('message',$message);
		}
		else{
			return view('auth.activate')->
				withErrors('Invalid code.');
		}
		
	}

}
