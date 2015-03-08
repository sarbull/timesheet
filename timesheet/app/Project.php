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

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function company() {
    return $this->belongsTo('App\Company');
  }

  public function tickets() {
    return $this->hasMany('App\Ticket');
  }
}
