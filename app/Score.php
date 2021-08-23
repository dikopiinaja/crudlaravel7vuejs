<?php

namespace App;
use App\Student;
use App\Subject;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';
    protected $fillable = ['student_id', 'subject_id', 'score'];
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
