<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class voucher extends Model
{
    use HasFactory;

    protected $fillable = [
      'tenvoucher',
      'anh',
      'giatri',
    ];

   public  function users(): BelongsToMany
   {
      return $this->belongsToMany(User::class);
   }
    public function packages(): BelongsToMany
    {
       return $this->belongsToMany(package::class)->withPivot('tile');
    }
}
