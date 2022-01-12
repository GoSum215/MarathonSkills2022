<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $registrationId
 * @property int $eventId
 * @property int $bibNumber
 * @property Carbon $raceTime
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class RegistrationEvent extends Model
{
    use HasFactory;
}
