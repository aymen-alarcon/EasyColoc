<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class credit extends Model
{
    protected $fillable = ["status", "depense_id", "user_id", "price"];

    public function user():BelongsTo{
        return $this->BelongsTo(User::class, "user_id");
    }

    public function depense():BelongsTo{
        return $this->BelongsTo(depense::class);
    }
}
