<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProjectsController extends Controller {

	public function index() {
		$projects = \Auth::user()->projects;
		return view('projects.index', ['projects' => $projects]);
	}

	public function create() {
		$project   = new \App\Project;
		$companies = \Auth::user()->companies;
		return view('projects.create', [
			'project' => $project,
			'companies' => $companies
		]);
	}

	public function store() {
		$input = \Input::all();
		$input['project']['user_id'] = \Auth::user()->id;
		$project = \App\Project::create($input['project']);
		return view('projects.show', ['project' => $project]);
	}

	public function show($id) {
		$project = \App\Project::find($id);
		return view('projects.show', ['project' => $project]);
	}

	public function edit($id) {
		$project = \App\Project::find($id);
		$companies = \Auth::user()->companies;
		return view('projects.edit', [
			'project' => $project,
			'companies' => $companies
		]);
	}

	public function update($id) {
		$input = \Input::all();
		$project = \App\Project::find($id);
		$project->update($input['project']);
		return view('projects.show', ['project' => $project]);
	}

	public function destroy($id) {

	}

}
