<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Student;
use App\Models\Department;
use App\Models\File;

class Staff extends Model
{
    use HasFactory;


    protected $fillable = [

        'user_id',
        'department_id',
        'firstname',
        'lastname',
        'dob',
        'dateJoined',
        'others'
    ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function student()
    {
        return $this->belongsTo(Student::class);
    }


}
