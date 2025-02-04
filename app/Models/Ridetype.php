<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ride;


class Ridetype extends Model
{
    use HasFactory;




    public function rides(){

        return $this->belongsTo(Ride::class);
    }




}
