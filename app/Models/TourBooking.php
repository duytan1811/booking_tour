<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'total_price',
        'coupon_code',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tour_booking_details()
    {
        return $this->hasMany(TourBookingDetail::class);
    }

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->return_time)->format('d/m/Y');
    }

    public function getStatusNameAttribute()
    {
        $status = config('constants.status');
        return $this->status == $status['active'] ? 'Đã xác nhận' : ($this->status == $status['cancel'] ? 'Hủy  bỏ' : 'Chờ xác nhận');
    }
}
