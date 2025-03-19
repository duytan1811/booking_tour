<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'object_id',
        'type',
        'status',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusNameAttribute()
    {
        $status = config('constants.status');
        return $this->status == $status['active'] ? 'Đã duyệt' : ($this->status == $status['in_active'] ? 'Chờ duyệt' : 'Từ chối');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->departure_time)->format('d/m/Y H:m');
    }
}
