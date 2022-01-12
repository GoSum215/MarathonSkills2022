<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $marathonName
 * @property int $eventId
 * @property string $cityName
 * @property int $countryCode
 * @property int $yearHeld
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Marathon extends Model
{
    use HasFactory;
}
