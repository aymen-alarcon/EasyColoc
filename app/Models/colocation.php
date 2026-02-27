<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Colocation extends Model
{
    protected $fillable = ["name", "description", "status", "owner_id"];

    public function users():HasMany{
        return $this->HasMany(User::class);
    }

    public function adhesion():HasMany{
        return $this->hasMany(Adhesion::class, "colocation_id");
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function depense():HasMany{
        return $this->hasMany(Depense::class, "colocation_id");
    }

    public function invites():HasMany{
        return $this->hasMany(Invitation::class, "colocation_id");
    }
}
