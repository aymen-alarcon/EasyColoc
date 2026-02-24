<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class adhesion extends Model
{
    protected $fillable = ["user_id", "colocation_id", "role", "left_at"];

    public function colocation():BelongsTo{
        return $this->belongsTo(colocation::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
