<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeSearch($query)
    {
        if(request('keyword')) {
            return $query->where('nama', 'like', '%' . request('keyword') . '%')
                        ->orWhere('deskripsi', 'like', '%' . request('keyword') . '%')
                        ->orWhere('harga', 'like', '%' . request('keyword') . '%');
        }
    }
}
