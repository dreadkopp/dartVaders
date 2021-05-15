<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenaltyLog extends Model
{

    protected $table = 'penalties_log';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
