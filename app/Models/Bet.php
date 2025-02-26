<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'groupId',
        'creatorId',
        'categoryId',
        'name',
        'description',
        'totalAmount',
        'startDate',
        'endDate',
        'status',
        'group_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'startDate' => 'timestamp',
        'endDate' => 'timestamp',
        'group_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function betCategory(): HasOne
    {
        return $this->hasOne(BetCategory::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function betEvents(): HasMany
    {
        return $this->hasMany(BetEvent::class);
    }

    public function betOptions(): HasMany
    {
        return $this->hasMany(BetOptions::class);
    }

    public function betUsers(): HasMany
    {
        return $this->hasMany(BetUser::class);
    }
}
