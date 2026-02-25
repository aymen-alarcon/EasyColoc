<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class depense extends Model
{
    protected $fillable = ["title", "price", "category_id", "buyer", "colocation_id"];

    public function category():BelongsTo{
        return $this->BelongsTo(category::class);
    }

    
    public function colocation(): BelongsTo
    {
        return $this->belongsTo(colocation::class);
    }

    public function payer():BelongsTo{
        return $this->BelongsTo(User::class, "buyer");
    }

    public function credit():HasMany{
        return $this->hasMany(credit::class);
    }
}
