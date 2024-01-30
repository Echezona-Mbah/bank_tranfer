<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tra_id',
        'sender_account_number',
        'reciever_account_number',
        'reciever_name',
        'reciever_bank',
        'swift',
        'iban',
        'bic',
        'otp',
        'currency',
        'amount',
        'fund_tranfer',
        'message',
        'status',
        'transaction_id',
        'service_charge',
        'pin_confirmed',

    ];

    protected $table ='tranfers';

    protected $primaryKey ='id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
