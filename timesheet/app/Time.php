<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model {
  protected $fillable = [
    'ticket_id'
  ];

  protected $appends = ['duration', 'created_att', 'stopped'];

  public function ticket() {
    return $this->belongsTo('App\Ticket');
  }

  public function getDurationAttribute() {
    $created_at = new \DateTime($this->created_at);
    $updated_at = new \DateTime($this->updated_at);
    $interval = $updated_at->diff($created_at);

    // %y years %m months %a day %h hours %i minutes %S seconds
    return $interval->format('%h hours %i minutes %s seconds');
  }

  public function getCreatedAttAttribute() {
    $created_at = new \DateTime($this->created_at);
    return $created_at->format('M d, Y - h:i:sA');
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

}
