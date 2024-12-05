<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'product_id',
        'file_id',
        'amount',
        'description',
        'status',
        'purpose',
        'user_id',
        'content',
        'others'

    ];

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
