<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\File;


class Student extends Model
{
    use HasFactory;

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'file_id',
        'group',
        'studenNo',
        'schoollocation',
        'courseStartDate',
        'university',
        'course',
        'courseEndDate',
        'aboutYou',
        'schooltown',
        'postcode',
        'declare'
    ];


    public function files()
    {
        return $this->hasMany(File::class);
    }
}
