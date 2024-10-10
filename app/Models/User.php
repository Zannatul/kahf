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


    const NOT_SCHEDULED = 1;
    const SCHEDULED = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'registration_no',
        'center_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'date_of_birth',
        'gender',
        'national_id',
        'password',
        'vaccination_status',
        'emergency_contact_name',
        'emergency_contact_phone',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function vaccineCenter()
    {
        return $this->belongsTo(VaccineCenter::class, 'center_id')->withDefault();
    }
    public function schedule()
    {
        return $this->hasOne(VaccineSchedule::class, 'user_id')->withDefault();
    }

    public function getVaccinationStatusAttribute()
    {
        // Get the vaccination status attribute
        $attribute = $this->attributes['vaccination_status'];

        // Check if the user has a scheduled vaccination date
        $scheduleDate = $this->schedule ? $this->schedule->scheduled_date : null;

        // Convert the scheduled date to a timestamp
        $scheduleDateTimestamp = $scheduleDate ? strtotime($scheduleDate) : null;

        // Get the current timestamp
        $todayTimestamp = time();

        // If the scheduled date has passed
        if ($scheduleDateTimestamp && $scheduleDateTimestamp < $todayTimestamp) {
            return '<code class="success-code-text">Vaccinated</code>';
        }

        // If the vaccination status is scheduled
        if ($attribute == self::SCHEDULED) {
            return '<code class="success-code-text">Scheduled</code>';
        }

        // If the vaccination status is not scheduled
        if ($attribute == self::NOT_SCHEDULED) {
            return '<code class="danger-code-text">Not Scheduled</code> <a href="' . url('user/create-schedule') . '">Create A Schedule</a>';
        }
    }
}
