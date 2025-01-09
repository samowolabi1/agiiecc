<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Ride extends Model
{
    use HasFactory;

    use sluggable;

        protected $fillable = [

            'name',
            'user_id',
            'company_id',
            'ridetype_id',
            'advert_id',
            'state_id',
            'color_id',
            'status',
            'price',
            'carbrand_id',
            'cartype_id',
            'short_description',
            'next_of_kin_name',
            'next_of_kin_address',
            'next_of_kin_phone_number',
            'spouse_name',
            'spouse_address',
            'spouse_phone_number',
            'car_plate_number',
            'car_engine_number',
            'license_number',
            'full_address',
            'status',
            'approved',
            
        ];


        public function sluggable(): array
            {
                return [
                    'slug' => [
                        'source' => 'name'
                    ]
                ];
            }
}
