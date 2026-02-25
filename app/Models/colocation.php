<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class colocation extends Model
{
    protected $fillable = ["name", "description", "status", "owner_id"];

    public function users():HasMany{
        return $this->HasMany(User::class);
    }

    public function adhesion():HasMany{
        return $this->hasMany(adhesion::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function depense():HasMany{
        return $this->hasMany(depense::class, "colocation_id");
    }
}
