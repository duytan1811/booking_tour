<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'image',
        'image_1',
        'name',
        'description',
        'content',
        'type',
        'category_id',
        'status',
        'created_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTypeNameAttribute()
    {
        $blog_types = config('constants.blog_types');
        return $blog_types[$this->type];
    }
    
    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->created_at)->format('M d, Y');
    }

    public function getImageUrlAttribute()
    {
        if($this->image){
            return asset('storage/' . $this->image);
        }

        return '';
    }

    public function getStatusNameAttribute()
    {
        $status = config('constants.status');
        return $this->status == $status['active'] ? 'Hoạt động' : 'Không hoạt động';
    }
}
