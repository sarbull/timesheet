<?php

class Project extends \Eloquent {

	protected $table    = 'projects';
	protected $fillable = ['name', 'user_id'];

	public function user() {
		return $this->belongsTo('User', 'user_id');
	}

	public function tasks() {
		return $this->hasMany('Task', 'project_id');
	}
}
