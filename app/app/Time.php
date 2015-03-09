<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model {
  protected $fillable = [
    'ticket_id',
  ];

  protected $appends = ['duration', 'created_att', 'stopped', 'seconds', 'hour'];

  public function ticket() {
    return $this->belongsTo('App\Ticket');
  }

  public function getDurationAttribute() {
    $created_at = new \DateTime($this->created_at);
    $updated_at = new \DateTime($this->updated_at);
    $interval = $updated_at->diff($created_at);
    return $interval;
  }

  public function getCreatedAttAttribute() {
    $created_at = new \DateTime($this->created_at);
    return $created_at;
  }

  public function getStoppedAttribute() {
    $start = $this->created_at;
    $stop = $this->updated_at;
    if($start == $stop) {
      return false;
    } else {
      return true;
    }
  }

  public function getHourAttribute() {
    return sprintf('%0.2f', $this->seconds/3600);
  }

  public function getSecondsAttribute() {
    $created_at = new \DateTime($this->created_at);
    $updated_at = new \DateTime($this->updated_at);

    return $updated_at->getTimestamp() - $created_at->getTimestamp();
  }

}
