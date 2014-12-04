<?php

class TimestampsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /tasks
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tasks/create
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tasks
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::only(['task_id']);

		$validator = Validator::make($data,[
			'task_id' => 'required'
		]);

		if($validator->fails()){
			return Redirect::route('tasks.show', ['task_id' => $data['task_id']])->withErrors($validator)->withInput();
		}
		$data['start'] = date('Y-m-d H:i:s', time());
		$newTimestamp = Timestamp::create($data);

		if($newTimestamp){
			return Redirect::route('tasks.show', ['task_id' => $data['task_id']]);
		}
	}


	public function end($timestamp_id) {
		$timestamp = Timestamp::find($timestamp_id);
		$timestamp->end = date('Y-m-d H:i:s', time());
		$timestamp->save();

		return Redirect::route('tasks.show', ['task_id' => $timestamp->task->id]);
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
