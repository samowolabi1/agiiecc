<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class Product extends Model
{
    use HasFactory;

    use sluggable;

        protected $fillable = [

            'name',
            'user_id',
            'company_id',
            'type_id',
            'advert_id',
            'size_id',
            'color_id',
            'created_by',
            'short_description',
            'description',
            'status',
            'approved',
            'measurement',
            'price',
            'discount',
            'product_link',
            'brand',
            'tags'
        ];

        public function sluggable(): array
            {
                return [
                    'slug' => [
                        'source' => 'name'
                    ]
                ];
            }

        public function files(){

        return $this->hasMany(File::class);
    }
}
