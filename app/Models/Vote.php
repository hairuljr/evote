<?php

namespace App\Models;

use Hexters\Ladmin\LadminLogable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory, LadminLogable;

    protected $guarded = [];

    public function creation()
    {
        return $this->belongsTo(Creation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function study()
    {
        return $this->belongsTo(Study::class);
    }
}
