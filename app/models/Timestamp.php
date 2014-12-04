<?php

class Timestamp extends \Eloquent {

	protected $table    = 'timestamps';
	protected $fillable = ['start', 'end', 'task_id'];

	public function task() {
		return $this->belongsTo('Task', 'task_id');
	}

	public function start_date() {
		return date("d/m/y h:i:s", strtotime($this->start));
	}

	public function end_date() {
		return date("d/m/y g:i A", strtotime($this->end));
	}

	public function total_spent() {
		$start = strtotime($this->start);
		if($this->end == NULL) {
			$end = time();
		} else {
			$end = strtotime($this->end);
		}
		
		$interval = abs($start - $end);

		// $w = $interval / 86400 / 7;
		// $d = $interval / 86400 % 7;
		$h = $interval / 3600 % 24;
		$m = $interval / 60 % 60; 
		$s = $interval % 60;

		// {$w} weeks, {$d} days, 
		return "{$h} hours, {$m} minutes and {$s} seconds";

	}
}
