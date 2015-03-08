<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CompaniesController extends Controller {

	public function index() {
		$companies = \Auth::user()->companies;
		return view('companies.index', ['companies' => $companies]);
	}

	public function create() {
		$company   = new \App\Company;
		return view('companies.create', [
			'company' => $company
		]);
	}

	public function store() {
		$input = \Input::all();
		$input['company']['user_id'] = \Auth::user()->id;
		$company = \App\Company::create($input['company']);
		return \Redirect::route('companies.show', ['company' => $company]);
	}

	public function show($id) {
		$company = \App\Company::find($id);
		return view('companies.show', ['company' => $company]);
	}

	public function edit($id) {
		$company = \App\Company::find($id);
		return view('companies.edit', [
			'company' => $company
		]);
	}

	public function update($id) {
		$input = \Input::all();
		$company = \App\Company::find($id);
		$company->update($input['company']);
		return \Redirect::route('companies.show', ['company' => $company]);
	}

	public function destroy($id){

	}

}
