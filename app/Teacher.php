<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected function courseName(){
      return $this->belongsTo('App\Course','course_id','id');
    }
}
