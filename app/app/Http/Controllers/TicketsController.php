<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TicketsController extends Controller {

	public function index(){

	}

	public function create($project_id) {
		$ticket   = new \App\Ticket;
		return view('projects.tickets.create', [
			'ticket' => $ticket,
			'project' => \App\Project::find($project_id),
			'statuses' => \App\Status::all()
		]);
	}

	public function store($project_id) {
		$input = \Input::all();
		$input['ticket']['project_id'] = $project_id;
		$v = \Validator::make($input['ticket'], \App\Ticket::$createRules);

		if ($v->fails()) {
			return \Redirect::route('projects.tickets.create', [
				'project_id' => $project_id
			])->withErrors($v->errors())->withInput();
		}

		$ticket = \App\Ticket::create($input['ticket']);
		return \Redirect::route('projects.tickets.show', [
			'project_id' => $project_id,
			'ticket_id'  => $ticket->id
		]);
	}

	public function show($project_id, $ticket_id) {
		$ticket = \App\Ticket::find($ticket_id);
		if($ticket->project->user_id == \Auth::user()->id){
			return view('projects.tickets.show', [
				'ticket' => $ticket,
				'project' => $ticket->project
			]);
		} else {
			return \Redirect::route('projects.index')->with('danger', 'Permission denied.');
		}
	}

	public function edit($project_id, $ticket_id) {
		$ticket = \App\Ticket::find($ticket_id);
		if($ticket->project->user_id == \Auth::user()->id){
			return view('projects.tickets.edit', [
				'ticket' => $ticket,
				'project' => $ticket->project,
				'statuses' => \App\Status::all()
			]);
		} else {
			return \Redirect::route('projects.index')->with('danger', 'Permission denied.');
		}
	}

	public function update($project_id, $ticket_id) {
		$input = \Input::all();
		$v = \Validator::make($input['ticket'], \App\Ticket::$updateRules);

		if ($v->fails()) {
			return \Redirect::route('projects.tickets.edit', [
				'project_id' => $project_id,
				'ticket_id'  => $ticket_id
			])->withErrors($v->errors())->withInput();
		}

		$ticket = \App\Ticket::find($ticket_id);
		$ticket->update($input['ticket']);
		return \Redirect::route('projects.tickets.show', [
			'project_id' => $project_id,
			'ticket_id' => $ticket_id
		]);
	}

	public function destroy($id) {

	}

}
