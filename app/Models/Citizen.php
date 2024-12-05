<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class Citizen extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_id',
        'form_id',
        'fullname',
        'maidenName',
        'nationality',
        'country',
        'placeOfBirth',
        'dob',
        'educationStatus',
        'maritalStatus',
        'passportNumber',
        'dateLastResidenceInNig',
        'addressInNig',
        'presentEmployment',
        'fatherName',
        'fatherAddress',
        'fatherOcupation',
        'certificateRequired',

    ];



    public function files()
    {
        return $this->belongsToMany(File::class, 'files_citizens', 'file_id', 'citizen_id');
    }
}
