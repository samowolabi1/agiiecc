<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RideServiceImage extends Model
{
    use HasFactory;
    protected $table = 'ride_service_image';

    protected $fillable = ['user_id', 'ride_id', 'service_id', 'image_name'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // Relationship with Ride
    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }

    // Relationship with Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
