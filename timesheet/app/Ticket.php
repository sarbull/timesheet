<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {
  protected $fillable = [
    'ref_id',
    'url',
    'title',
    'project_id',
    'status_id'
  ];

  public function project() {
    return $this->belongsTo('App\Project');
  }

  public function status() {
    return $this->belongsTo('App\Status');
  }

  public function times() {
    return $this->hasMany('App\Time');
  }

}
