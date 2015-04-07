<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {

	public function index() {
		$user    = \Auth::user();
		$times   = $user->times;
		$today   = new \Datetime("today");
		$factory = new \CalendR\Calendar;
		$month = $factory->getMonth($today->format('Y'), $today->format('m'));

		return view('dashboard.index', [
			'user'    => $user,
			'times'   => $times,
			'today'   => $today,
			'factory' => $factory,
			'month'   => $month
		]);
	}

	public function last30days($project_id) {
		$user     = \Auth::user();
		$today    = new \Datetime;
		$time_ago = new \Datetime;
		date_sub($time_ago, date_interval_create_from_date_string('31 days'));
		$project = $user->projects()->where('id', '=', $project_id)->get()->first();
		$str     = $time_ago->format('Y-m-d H:i:s');

		$times   = $project->times()->where('times.created_at', '>=', $str)->get();
		return view('dashboard.last30days', [
			'times' => $times,
			'time_ago' => $time_ago,
			'today' => $today
		]);
	}

}
