<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

  protected $fillable = ['name', 'logo'];

  public function projects() {
    return $this->hasMany('App\Project');
  }
}
