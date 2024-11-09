<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use App\Models\Cart;
use App\Mails\QueuedVerifyEmail;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Devdojo\Auth\Models\User as AuthUser;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends AuthUser implements FilamentUser, ShouldQueue {
    use HasFactory, Notifiable;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
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
    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function booted()
    {
        static::created(function ($user) {
            // Buat keranjang aktif untuk user baru
            Cart::create([
                'user_id' => $user->id,
                'is_active' => true,
            ]);
        });
    }

    public function canAccessPanel( Panel $panel ): bool {
        return true;

    }

    public function cart() {
        return $this->hasOne( Cart::class );
    }

}
