<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {

	public function index() {
		$user    = \Auth::user();
		$times   = $user->times->first();
		$today   = new \Datetime("today");
		$factory = new \CalendR\Calendar;
		$month = $factory->getMonth(2015, 03);

		return view('dashboard.index', [
			'user'    => $user,
			'times'   => $times,
			'today'   => $today,
			'factory' => $factory,
			'month'   => $month
		]);
	}

}
