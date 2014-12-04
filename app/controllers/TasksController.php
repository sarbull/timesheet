<?php

class TasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /tasks
	 *
	 * @return Response
	 */
	public function index($project_id)
	{
		$project = Project::find($project_id);
		$tasks   = $project->tasks;
		return View::make('tasks.index', ['tasks' => $tasks, 'project' => $project]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tasks/create
	 *
	 * @return Response
	 */
	public function create($project_id)
	{
		return View::make('tasks.create', ['project_id' => $project_id]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tasks
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::only(['title', 'task_id', 'project_id', 'url', 'status']);

		$validator = Validator::make($data,[
			'title'      => 'required|min:5',
			'project_id' => 'required|numeric',
			'status'     => 'required'
		]);

		if($validator->fails()){
			return Redirect::route('tasks.create', ['project_id' => $data['project_id']])->withErrors($validator)->withInput();
		}

		$newTask = Task::create($data);

		if($newTask){
			return Redirect::route('tasks.index', ['project_id' => $data['project_id']]);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task = Task::find($id);
		return View::make('tasks.show', ['task' => $task]);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tasks/{id}/edit
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
	 * PUT /tasks/{id}
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
	 * DELETE /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
