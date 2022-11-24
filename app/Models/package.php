<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    use HasFactory;
   protected $fillable = [
       'ten',
       'anh',
   ];


   public  function  vouchers()
   {
      return $this->belongsToMany(voucher::class)->withPivot('tile');
   }
}
