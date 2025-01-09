<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;

class Advert extends Model
{
    use HasFactory;


        protected $fillable = [
        'company_id',
        'user_id',
        'category_id',
        'status',
        'approved',
        'paid',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
