<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model {
  protected $fillable = [
    'start',
    'stop',
    'ticket_id'
  ];

  public function ticket() {
    return $this->belongsTo('App\Ticket');
  }

}
