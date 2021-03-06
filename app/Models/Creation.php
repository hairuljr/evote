<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getThumbnailAttribute($value)
    {
        return  asset('storage/creations/' . $value);
    }

    public function photo()
    {
        return $this->hasMany(PhotoCreation::class);
    }

    public function vote()
    {
        return $this->hasMany(Vote::class);
    }

    public function study()
    {
        return $this->belongsTo(Study::class);
    }
}
