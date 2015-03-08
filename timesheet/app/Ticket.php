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
    return $this->belongs_to('App\Project');
  }

  public function status() {
    return $this->belongs_to('App\Status');
  }

}
