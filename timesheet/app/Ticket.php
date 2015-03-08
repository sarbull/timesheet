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

  protected $appends = ['has_time_started', 'hours_spent'];

  public function project() {
    return $this->belongsTo('App\Project');
  }

  public function status() {
    return $this->belongsTo('App\Status');
  }

  public function times() {
    return $this->hasMany('App\Time')->orderBy('created_at', 'desc');
  }

  public function getHoursSpentAttribute() {
    $duration = new \DateTime('00:00');
    $f        = clone $duration;
    foreach ($this->times as $time) {
      $duration->add($time->duration);
    }
    return $f->diff($duration);
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
