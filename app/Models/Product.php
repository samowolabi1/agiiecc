<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class Product extends Model
{
    use HasFactory;



        protected $fillable = [

            'user_id',
            'title',
            'cost',
            'description',
            'additional',
            'status'
        ];


        public function files(){

        return $this->hasMany(File::class);
    }
}
