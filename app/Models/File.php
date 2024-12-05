<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Citizen;
use App\Models\Documentation;
use App\Models\Emergency;
use App\Models\impediment;
use App\Models\Lost;
use App\Models\pensioner;
use App\Models\Police;

class File extends Model
{
    use HasFactory;


    protected $fillable = [

        'title',
        'tag',
        'type',
        'typeName',
        'status',
    ];

    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }

    public function documentation()
    {
        return $this->belongsTo(Documentation::class);
    }

    public function emergency()
    {
        return $this->belongsTo(Emergency::class);
    }

    public function impediment()
    {
        return $this->belongsTo(impediment::class);
    }
}
