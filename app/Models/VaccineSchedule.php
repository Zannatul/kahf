<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'center_id',
        'vaccine_name',
        'scheduled_date',
        'scheduled_time',
        'created_at',
        'updated_at',
    ];

    /**
     * Define the relationship with the User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with the VaccineCenter.
     */
    public function vaccineCenter()
    {
        return $this->belongsTo(VaccineCenter::class);
    }
}
