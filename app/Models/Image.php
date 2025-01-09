<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'product_id',
        'image_name',
        'new_name',
        'status',
        'approved',
        'edited',
        'extension',
        'created_by',
        'description',
    ];
}
