<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    protected $fillable = ["colocation_id", "status", "email", "token"];

    public function user():BelongsTo{
        return $this->belongsTo(User::class, "receiver_id");
    }

    public function colocation():BelongsTo{
        return $this->belongsTo(colocation::class, "colocation_id");
    }
}
