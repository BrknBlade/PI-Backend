<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 'business_info';
    protected $fillable = [
        'company_name',
        'phone_number',
        'email',
        'address',
        'week_open_at',
        'week_close_at',
        'weekend_open_at',
        'weekend_close_at',
        'sunday_work',
        'email_reminder',
        'sms_reminder',
        'employee_reminder',
        'daily_summary',
        'maximum_booking_days',
        'limit_cancell_hours',
        'minimum_booking_hours'
    ];
}
