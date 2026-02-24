<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
