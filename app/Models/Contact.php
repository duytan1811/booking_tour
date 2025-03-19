<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'comment',
        'status',
        'created_at',
    ];

    public function getFullNameAttribute(){
        return $this->first_name . ' '. $this->last_name;
    }

    public function getStatusNameAttribute()
    {
        $status = config('constants.status');
        return $this->status == $status['active'] ? 'Đã xem' : 'Chưa đọc';
    }
}
