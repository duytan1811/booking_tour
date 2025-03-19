<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'status',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function getStatusNameAttribute()
    {
        $status = config('constants.status');
        return $this->status == $status['active'] ? 'Hoạt động' : 'Không hoạt động';
    }
}
