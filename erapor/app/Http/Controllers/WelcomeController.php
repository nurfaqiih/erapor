<?php namespace App\Http\Controllers;

use App\Http\Excel\UserListExport;

class WelcomeController extends Controller {

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{
		return view('welcome');
	}

}
