<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
	use Notifiable;
	
    protected function seminarName(){
      return $this->belongsTo('App\Seminar','seminar_id','id');
    }

    protected function admissionStatusName(){
      return $this->belongsTo('App\AdmissionStatus','admission_status','id');
    }
}
