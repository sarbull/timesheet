<?php

class ProjectsController extends \BaseController {

	public function index() {
		$projects = Project::all();
		return View::make('projects.index', ['projects' => $projects]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /projects/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /projects
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::only(['name']);

		$validator = Validator::make($data,['name' => 'required|min:3']);

		if($validator->fails()){
			return Redirect::route('projects.create')->withErrors($validator)->withInput();
		}
		$data['user_id'] = Auth::user()->id;

		$newProject = Project::create($data);

		if($newProject){
			return Redirect::route('projects.index');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = Project::find($id);
		return View::make('projects.show', ['project' => $project]);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /projects/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
