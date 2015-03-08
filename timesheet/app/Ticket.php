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

  protected $appends = ['has_time_started'];

  public function project() {
    return $this->belongsTo('App\Project');
  }

  public function status() {
    return $this->belongsTo('App\Status');
  }

  public function times() {
    return $this->hasMany('App\Time');
  }

  public function getHasTimeStartedAttribute() {
    $times_size = $this->times->count();
    $stopped_count = 0;
    foreach ($this->times as $time) {
      if($time->stopped) {
        $stopped_count++;
      }
    }
    if($times_size == $stopped_count) {
      return true;
    } else {
      return false;
    }
  }

}
