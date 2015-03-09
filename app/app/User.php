<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	protected $table = 'users';

	protected $fillable = ['name', 'email', 'password'];

	protected $appends = ['working_on'];

	protected $hidden = ['password', 'remember_token'];

	public function projects() {
		return $this->hasMany('App\Project');
	}

	public function tickets() {
		return $this->hasManyThrough('App\Ticket', 'App\Project');
	}

	public function companies() {
		return $this->hasMany('App\Company');
	}

	public function getWorkingOnAttribute() {
		foreach ($this->tickets as $ticket) {
			foreach ($ticket->times as $time) {
				if(!$time->stopped){
					return $time->ticket;
				}
			}
		}
		return false;
	}
}
