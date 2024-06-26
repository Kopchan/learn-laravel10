<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'surname', 'name', 'patronymic', 'login', 'password', 'role_id'
    ];
    protected $hidden = ['password'];
    protected $casts = ['password' => 'hashed'];

    public function role() {
        $this->belongsTo(Role::class);
    }
}
