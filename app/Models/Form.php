<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Police;
use App\Models\Citizen;
use App\Models\Documentation;
use App\Models\Emergency;
use App\Models\impediment;
use App\Models\Lost;
use App\Models\Pensioner;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Impend;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'filename',
        'others'

    ];

    public function polices()
    {
        return $this->hasMany(Police::class);
    }

    public function impends()
    {
        return $this->hasMany(Impend::class);
    }
    public function losts()
    {
        return $this->hasMany(Lost::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function citizens()
    {
        return $this->hasMany(Citizen::class);
    }

    public function documentations()
    {
        return $this->hasMany(Documentation::class);
    }
    public function emergencies()
    {
        return $this->hasMany(Emergency::class);
    }
    public function inpediments()
    {
        return $this->hasMany(impediment::class);
    }
    public function pensioners()
    {
        return $this->hasMany(Pensioner::class);
    }
}
