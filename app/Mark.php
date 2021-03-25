<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{

    protected $fillable = [
        'subject_id','student_id','mark'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
