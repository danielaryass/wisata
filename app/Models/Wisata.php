<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $table = 'wisata';

    protected $fillable = [
        'name', 'description', 'address', 'thumbnail', 'longitude', 'latitude'
    ];

  public function gambar_wisata()
    {
        return $this->hasMany(GambarWisata::class,'wisata_id');
    }
}
