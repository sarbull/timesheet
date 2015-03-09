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
		$v = \Validator::make($input['project'], \App\Project::$createRules);
		$project   = new \App\Project;

		if ($v->fails()) {
			return \Redirect::route('projects.create', [
				'project' => $project
			])->withErrors($v->errors())->withInput();
		}

		$input['project']['user_id'] = \Auth::user()->id;
		$project = \App\Project::create($input['project']);
		return \Redirect::route('projects.show', ['project' => $project]);
	}

	public function show($id) {
		$project = \App\Project::find($id);
		if($project->user_id == \Auth::user()->id){
			return view('projects.show', ['project' => $project]);
		} else {
			return \Redirect::route('projects.index')->with('danger', 'Permission denied.');
		}
	}

	public function edit($id) {
		$project = \App\Project::find($id);
		if($project->user_id == \Auth::user()->id){
		$companies = \Auth::user()->companies;
			return view('projects.edit', [
				'project' => $project,
				'companies' => $companies
			]);
		} else {
			return \Redirect::route('projects.index')->with('danger', 'Permission denied.');
		}
	}

	public function update($id) {
		$input   = \Input::all();
		$project = \App\Project::find($id);
		$v = \Validator::make($input['project'], \App\Project::$updateRules);

		if ($v->fails()) {
			return \Redirect::route('projects.edit', [
				'project' => $project
			])->withErrors($v->errors())->withInput();
		}

		$project->update($input['project']);
		return \Redirect::route('projects.show', ['project' => $project]);
	}

	public function destroy($id) {

	}

}
