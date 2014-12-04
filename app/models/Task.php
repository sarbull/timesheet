<?php

class Task extends \Eloquent {

	protected $table    = 'tasks';
	protected $fillable = ['url', 'title', 'status', 'task_id', 'project_id'];

	public function project() {
		return $this->belongsTo('Project', 'project_id');
	}

	public function timestampss() {
		return $this->hasMany('Timestamp', 'task_id');
	}

}
