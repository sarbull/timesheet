<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
  protected $fillable = [
    'name',
    'logo',
    'description',
    'production_url',
    'development_url',
    'test_url',
    'user_id',
    'company_id'
  ];

  protected $appends = ['hours_spent'];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function company() {
    return $this->belongsTo('App\Company');
  }

  public function tickets() {
    return $this->hasMany('App\Ticket');
  }

  public function getHoursSpentAttribute() {
    $duration = new \DateTime('00:00');
    $f        = clone $duration;
    foreach ($this->tickets as $ticket) {
      foreach ($ticket->times as $time) {
        $duration->add($time->duration);
      }
    }
    return $f->diff($duration);
  }

}
