<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilterTanggal($query)
    {
        if(request('start_date') && request('end_date')) {
            return $query->whereBetween('tanggal', [request('start_date'), request('end_date')]);
        }
    }
}
