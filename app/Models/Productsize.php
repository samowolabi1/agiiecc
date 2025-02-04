<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productsize extends Model
{
    use HasFactory;

        protected $fillable = [

            'name',
            'user_id',
            'company_id',
            'advert_id',
            'product_id'
        ];
}
