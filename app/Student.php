<?php

namespace App;
use App\Score;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";
    protected $fillable = ['name'];
    public $timestamps = false;

    public function score()
    {
        return $this->hasMany(Score::class);
    }

    // public function student()
    // {

    // }
}
