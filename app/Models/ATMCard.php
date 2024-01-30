<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ATMCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'card_type',
        'card_model',
        'status',

    ];

    protected $table ='a_t_m_cards';

    protected $primaryKey ='id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
