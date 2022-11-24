<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class miss extends Model
{
    use HasFactory;

    protected $fillable = [
        'tennv',
        'chitietnv',
        'soluotdcnhan',
    ];

    public function users()
    {
       $this->belongsToMany(User::class);
    }
}
