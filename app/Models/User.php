<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function penalties(): HasMany
    {

        return $this->hasMany(PenaltyLog::class)->where('paid', 0);
    }

    public function allPenalties(): HasMany
    {

        return $this->hasMany(PenaltyLog::class);
    }

    public function addPenalty(Penalty $penalty)
    {
        $log = new PenaltyLog();
        $log->user_id = $this->id;
        $log->value = $penalty->value;
        $log->name = $penalty->name;
    }
}
