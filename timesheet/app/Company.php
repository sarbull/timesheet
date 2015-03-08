<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

  protected $fillable = ['name', 'logo', 'user_id'];

  public function projects() {
    return $this->hasMany('App\Project');
  }

  public function user() {
    return $this->belongsTo('App\User');
  }
}
