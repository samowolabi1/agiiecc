<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Sevicetype;
use App\Models\Advert;
use App\Models\User;
use App\Models\Company;
use App\Models\Image;

class Service extends Model
{
    use HasFactory;


        use sluggable;

        protected $fillable = [

            'name',
            'user_id',
            'company_id',
            'sevicetype_id',
            'advert_id',
            'short_description',
            'description',
            'status',
            'price',
        ];


        public function sluggable(): array
            {
                return [
                    'slug' => [
                        'source' => 'name'
                    ]
                ];
            }


        public function sevicetype()
        {
            return $this->belongsTo(Sevicetype::class);
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
