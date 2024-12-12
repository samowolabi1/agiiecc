<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\User;

class Company extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillables = [

        'name',
        'short_description',
        'phone_number',
        'website',
        'address',
        'status',
        'description',
        'tags',
        'shop_link',
        'slogan',
        'brand_name',
        'state_id',
        'facebook',
        'whatsapp',
        'twitter',
        'instagram'

    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function advert()
    {
        return $this->hasMany(Advert::class);
    }

}
