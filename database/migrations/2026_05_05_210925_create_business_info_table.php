<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('business_info', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'owner_id')->constrained()->cascadeOnDelete();
            $table->string('company_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address');
            $table->time('week_open_at');
            $table->time('week_close_at');
            $table->time('weekend_open_at');
            $table->time('weekend_close_at');
            $table->boolean('sunday_work')->default(false);
            $table->boolean('email_reminder')->default(false);
            $table->boolean('sms_reminder')->default(false);
            $table->boolean('employee_reminder')->default(false);
            $table->boolean('daily_summary')->default(false);
            $table->integer('maximum_booking_days')->default(14);
            $table->integer('limit_cancell_hours')->default(24);
            $table->integer('minimum_booking_hours')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_info');
    }
};
