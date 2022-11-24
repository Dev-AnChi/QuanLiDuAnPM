<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    use HasFactory;

    protected $fillable = [
      'tenvoucher',
      'anh',
      'giatri',
    ];

   public  function users()
   {
      return $this->belongsToMany(User::class);
   }
    public function packages()
    {
       return $this->belongsToMany(package::class);
    }
}
