<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Advertfee;
use App\Models\Company;
use App\Models\Payment;

class Transaction extends Model
{
    use HasFactory;


       protected $fillable = [

        'user_id',
        'advertfee_id',
        'company_id',
        'advert_id',
        'payment_id',
        'amount',
        'description',
        'item',
        'item_id',
        'item_category',
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

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}

