<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $event_name
 * @property int $event_type
 * @property int $marathon_id
 * @property string $start_data
 * @property int $max_participants
 * @property int $cost
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Event extends Model
{
    use HasFactory;
}
