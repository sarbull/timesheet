<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TimesController extends Controller {

	public function start($ticket_id) {
		\App\Time::create([
			'ticket_id' => $ticket_id
		]);
		return \Redirect::route('tickets.show', ['id' => $ticket_id]);
	}

	public function stop($id) {
		$time = \App\Time::find($id);
		$time->touch();
		return \Redirect::route('tickets.show', ['id' => $time->ticket->id]);
	}

}
