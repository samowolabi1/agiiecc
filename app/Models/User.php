<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Student;
use App\Models\Department;
use App\Models\File;
use App\Models\Police;
use App\Models\Impend;
use App\Models\Pensioner;
use App\Models\Emergency;
use App\Models\Sibling;
use App\Models\Company;
use App\Models\Advert;



class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     * 
     *
     * @var array<int, string>
     * 
     *  
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'forename',
        'userid',
        'department_id',
        'address1',
        'address2',
        'nigeriaAddress',
        'passportNo',
        'dob',
        'sex',
        'houseNo',
        'phoneNumber',
        'postcode',
        'stateOfOrigin',
        'email',
        'password',
    ];


    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function advert()
    {
        return $this->hasMany(Advert::class);
    }

    public function pensioners()
    {
        return $this->hasMany(Pensioner::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
