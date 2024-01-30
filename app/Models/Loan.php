<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'loan_type',
        'amount',
        'message',
        'status',

    ];

    protected $table ='loans';

    protected $primaryKey ='id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
