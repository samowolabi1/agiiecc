<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use App\Models\Category;
use App\Models\Service;
use App\Models\Ride;
use App\Models\Advertfee;

class Advert extends Model
{
    use HasFactory;


        protected $fillable = [
        'company_id',
        'user_id',
        'advertfee_id',
        'category_id',
        'status',
        'approved',
        'paid',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function advertfee()
    {
        return $this->belongsTo(Advertfee::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }

     public function service()
    {
        return $this->hasOne(Service::class);
    }

     public function ride()
    {
        return $this->hasOne(Ride::class);
    }


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
