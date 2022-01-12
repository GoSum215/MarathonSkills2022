<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $eventName
 * @property int $eventType
 * @property Carbon $startDataTime
 * @property int $maxParticipants
 * @property int $cost
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Event extends Model
{
    use HasFactory;
}
