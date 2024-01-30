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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
        'balance',
        'amount',
        'account_number',
        'account_type',
        'city',
        'state',
        'address',
        'gender',
        'Tranfer_pin',
        'otp',
        'Nationality',
        'next_kin_relation',
        'next_kin_address',
        'profile_image',
        'status',
        'transaction_status',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $table ='users';
    protected $primaryKey ='id';

    public function tranfers()
    {
        return $this->hasOne(Tranfer::class, 'user_id');
    }

    public function a_t_m_cards()
    {
        return $this->hasMany(ATMCard::class, 'user_id');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class, 'user_id');
    }
}
