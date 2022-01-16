<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoCreation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPictureAttribute($value)
    {
        return  asset('storage/creations/' . $value);
    }

    public function creation()
    {
        return $this->belongsTo(Creation::class);
    }
}
