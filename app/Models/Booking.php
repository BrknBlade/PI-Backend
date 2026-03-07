<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'gender',
        'description',
        'date',
        'hour',
        'user_id',
        'cut_type_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cutType()
    {
        return $this->belongsTo(CutType::class);
    }
}
