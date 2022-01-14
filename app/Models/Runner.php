<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $gender
 * @property string $country
 * @property Carbon $date_of_birthday
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Runner extends Model
{
    use HasFactory;
}
