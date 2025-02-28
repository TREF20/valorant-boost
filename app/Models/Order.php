<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'valorant_nick',
        'discord',
        'service',
        'user_id',
        'is_completed',
        'vp_amount', // Добавляем новое поле
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}