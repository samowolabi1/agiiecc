<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
}
