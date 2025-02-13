<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use App\Models\Type;
use App\Models\Advert;
use App\Models\User;
use App\Models\Company;
use App\Models\Image;
use App\Models\Category;
use App\Models\createreview;

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

    public function files()
    {

        return $this->hasMany(File::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
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

    public function reviews()
    {
        return $this->hasMany(createreview::class);
    }

}
