<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Adhesion extends Model
{
    protected $fillable = ["user_id", "colocation_id", "left_at"];

    public function colocation():BelongsTo{
        return $this->belongsTo(colocation::class, "colocation_id");
    }

    public function user():HasMany
    {
        return $this->HasMany(User::class, "user_id");
    }
}
