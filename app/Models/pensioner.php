<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

class pensioner extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'file_id',
        'title'

    ];


    public function files()
    {
        return $this->hasMany(File::class);
    }
}
