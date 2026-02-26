<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
        'reputation',
    ];

    public function colocation():BelongsTo{
        return $this->BelongsTo(colocation::class);
    }

    public function ownColocation():HasOne{
        return $this->hasOne(colocation::class, "owner_id");
    }

    public function adhesions():HasMany{
        return $this->HasMany(adhesion::class, "user_id");
    }

    public function payed():HasMany{
        return $this->hasMany(depense::class, "buyer");
    }

    public function role():BelongsTo{
        return $this->belongsTo(Role::class);
    }

    public function credit():HasMany{
        return $this->hasMany(credit::class, "user_id");
    }

    public function invitation():HasMany{
        return $this->hasMany(Invitation::class, "receiver_id");
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}