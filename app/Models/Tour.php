<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'name',
        'destination',
        'departure_time',
        'age_restriction',
        'dress_code',
        'return_time',
        'price',
        'image',
        'description',
        'is_outstanding',
        'people',
        'status',
        'type',
    ];

    public function getDepartureTimeFormattedAttribute()
    {
        return Carbon::parse($this->departure_time)->format('d/m/Y');
    }

    public function getReturnTimeFormattedAttribute()
    {
        return Carbon::parse($this->return_time)->format('d/m/Y');
    }

    public function getStatusNameAttribute()
    {
        $status = config('constants.status');
        return $this->status == $status['active'] ? 'Hoạt động' : 'Không hoạt động';
    }

    public function getTourDaysAttribute()
    {
        $date1 = Carbon::parse($this->return_time);
        $date2 = Carbon::parse($this->departure_time);

        $value = $date1->diffInDays($date2);
        return $value == 0 ? 1 : $value;
    }
}
