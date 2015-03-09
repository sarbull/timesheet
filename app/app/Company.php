<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

  protected $fillable = ['name', 'logo', 'user_id'];

  public static $createRules = [
    'name'    => ['required'],
    'user_id' => ['required', 'exists:users,id']
  ];

  public static $updateRules = [
    'name' => ['required']
  ];

  public function projects() {
    return $this->hasMany('App\Project');
  }

  public function user() {
    return $this->belongsTo('App\User');
  }
}
