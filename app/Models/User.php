<?php

namespace App\Models;

use Hexters\Ladmin\LadminTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LadminTrait;

    protected $fillable = [
        'name',
        'email',
        'nim',
        'password',
        'no_hp'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function vote()
    {
        return $this->hasMany(Vote::class);
    }

    public function voteHistory()
    {
        return $this->hasMany(VoteHistory::class);
    }
}
