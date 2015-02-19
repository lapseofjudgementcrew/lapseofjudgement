<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {
	public function __construct()
	{
		$this->middleware('auth');
	}

	function home(){
		return view('home');

	}

	function krakenhunt(){

		return view('krakenhunt');
	}
}
