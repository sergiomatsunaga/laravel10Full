<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Attribute;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//Função para habilitar edição de qualquer ATRIBUTO pelo eloquent
  //  protected $guarded = [];
  
//caso contrário os ATRIBUTOS tem de estar listados como fillable
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            //get: fn (string $value) => cry($value),
            set: fn (string $value) => bcrypt($value),
        );
    }


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
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
