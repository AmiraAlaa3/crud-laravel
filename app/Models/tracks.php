<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracks extends Model
{
    use HasFactory;
    protected $fillable=['name','student_numbers','track_type','branch_name','track_status','description','logo'];
    function students()
    {
        return $this->hasMany(Student::class);
    }
}
