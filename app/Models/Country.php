<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $countryCode
 * @property string $countryName
 * @property int $countryFlagId
 */

class Country extends Model
{
    use HasFactory;
}
