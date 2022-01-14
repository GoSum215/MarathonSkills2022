<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $runner_id
 * @property int|null $registration_id
 * @property int $event_id
 * @property int $bib_number
 * @property Carbon $race_time
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class RegistrationEvent extends Model
{
    use HasFactory;
}
