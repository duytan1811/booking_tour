<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourBookingDetail extends Model
{
    protected $fillable = [
        'tour_booking_id',
        'tour_id',
        'price',
    ];

    public function tour(){
        return $this->belongsTo(Tour::class);
    }

    public function tour_booking(){
        return $this->belongsTo(TourBooking::class);
    }
}
