<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $runnerId
 * @property Carbon $registrationDataTime
 * @property int $registrationStatus
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Registration extends Model
{
    use HasFactory;
}
