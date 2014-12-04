<?php

class UsersController extends \BaseController {

	public function login() {
		if(Auth::check()){
			return Redirect::to('/profile');
		} else {
			return View::make('users.login');
		}
	}

	public function handleLogin() {
		$data = Input::only(['email', 'password']);

		$validator = Validator::make(
			$data,
			[
				'email'    => 'required|email|min:8',
				'password' => 'required',
			]
		);

		if($validator->fails()){
			return Redirect::route('login')->withErrors($validator)->withInput();
		}

		if (Auth::attempt(array('email' => $data['email'], 'password' => $data['password']))) {
			return Redirect::route('root');
		}

		return Redirect::route('login')->withInput();
	}

	public function logout() {
		if(Auth::check()){
			Auth::logout();
		}
		return Redirect::route('root');
	}

	public function store() {
		$data = Input::only(['email', 'password', 'password_confirmation']);

		$validator = Validator::make(
			$data,
			[
				'email'                 => 'required|email|min:5|unique:users',
				'password'              => 'required|min:5|confirmed',
				'password_confirmation' => 'required|min:5'
			]
		);

		if($validator->fails()){
			return Redirect::route('register')->withErrors($validator)->withInput();
		}

		$data['password'] = Hash::make($data['password']);

		$newUser = User::create($data);
		if($newUser){
			Auth::login($newUser);
			return Redirect::route('root');
		}

	}

	public function register() {
		return View::make('users.register');
	}


	public function index() {

	}

	public function create() {

	}

	public function show($id) {

	}

	public function edit($id) {

	}

	public function update($id) {

	}

	public function destroy($id) {

	}

}
