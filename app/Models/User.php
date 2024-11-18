<?php

namespace App\Models;

use Filament\Panel;
use App\Models\Cart;
use App\Models\Order;
use App\Mails\QueuedVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Devdojo\Auth\Models\User as AuthUser;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements  MustVerifyEmail, FilamentUser, ShouldQueue {
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
        'email_verified_at'
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

    public function canAccessPanel( Panel $panel ): bool {
        return str_ends_with( $this->email, 'khfii635@gmail.com' ) && $this->hasVerifiedEmail();

    }

    public function carts() {
        return $this->hasMany( Cart::class );
    }

    public function orders() {
        return $this->hasMany( Order::class );
    }

}
