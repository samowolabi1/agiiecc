<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Ridetype;
use App\Models\Advert;
use App\Models\User;
use App\Models\Company;
use App\Models\Image;

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



        public function ridetype()
        {
            return $this->belongsTo(Ridetype::class);
        }

        public function advert()
        {
            return $this->belongsTo(Advert::class);
        }

        public function user()
        {
            return $this->belongsTo(user::class);
        }

        public function company()
        {
            return $this->belongsTo(Company::class);
        }

        public function images()
        {
            return $this->hasMany(Image::class);
        }
}
