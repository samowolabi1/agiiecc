<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Advertfee;
use App\Models\Company;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'advertfee_id',
        'company_id',
        'amount',
        'description',
        'status',
        'purpose',
        'cost',
        'quantity',
        'currency'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function advertfee()
    {
        return $this->belongsTo(Advertfee::class);
    }

        public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

