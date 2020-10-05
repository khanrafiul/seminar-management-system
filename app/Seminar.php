<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected function seminarTeacher(){
    	return $this->belongsTo('App\Teacher','teacher_id','id');
    }
}
