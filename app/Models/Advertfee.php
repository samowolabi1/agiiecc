<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advert;

class Advertfee extends Model
{
    use HasFactory;






    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }
}
