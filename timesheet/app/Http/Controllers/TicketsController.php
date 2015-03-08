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
		$ticket = \App\Ticket::create($input['ticket']);
		return view('projects.tickets.show', ['ticket' => $ticket]);
	}

	public function show($project_id, $ticket_id) {
		$ticket = \App\Ticket::find($ticket_id);
		return view('projects.tickets.show', ['ticket' => $ticket]);
	}

	public function edit($project_id, $ticket_id) {
		$ticket = \App\Ticket::find($ticket_id);
		return view('projects.tickets.edit', [
			'ticket' => $ticket,
			'project' => $ticket->project,
			'statuses' => \App\Status::all()
		]);
	}

	public function update($project_id, $ticket_id) {
		$input = \Input::all();
		$ticket = \App\Ticket::find($ticket_id);
		$ticket->update($input['ticket']);
		return view('projects.tickets.show', [
			'ticket' => $ticket,
			'project' => $ticket->project
		]);
	}

	public function destroy($id) {

	}

}
