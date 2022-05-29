<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query)
    {
        if(request('keyword')) {
            return $query->where('activity_name', 'like', '%' . request('keyword') . '%')
                        ->orWhere('created_at', 'like', '%' . request('keyword') . '%');
        }
    }
}
