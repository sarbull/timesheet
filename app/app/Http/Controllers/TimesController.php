<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TimesController extends Controller {

	public function start($ticket_id) {
		foreach (\Auth::user()->tickets as $ticket) {
			foreach ($ticket->times as $time) {
				if($time->created_at == $time->updated_at) {
					return \Redirect::route('projects.tickets.show', [
						'project_id' => $ticket->project->id,
						'ticket_id' => $ticket->id
					]);
				}
			}
		}

		$time = \App\Time::create([
			'ticket_id' => $ticket_id
		]);
		return \Redirect::route('projects.tickets.show', [
			'project_id' => $time->ticket->project->id,
			'ticket_id' => $time->ticket->id
		]);
	}

	public function stop($id) {
		$time = \App\Time::find($id);
		$time->touch();
		return \Redirect::route('projects.tickets.show', [
			'project_id' => $time->ticket->project->id,
			'ticket_id' => $time->ticket->id
		]);
	}

}
