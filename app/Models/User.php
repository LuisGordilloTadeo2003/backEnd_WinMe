<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function betOptions(): BelongsToMany
    {
        return $this->belongsToMany(BetOptions::class);
    }

    public function group(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }

    public function bet(): HasMany
    {
        return $this->hasMany(Bet::class);
    }

    public function betUser(): HasMany
    {
        return $this->hasMany(BetUser::class);
    }

    public function betRecord(): HasMany
    {
        return $this->hasMany(BetRecord::class);
    }

    public function validation(): HasMany
    {
        return $this->hasMany(Validation::class);
    }
}
