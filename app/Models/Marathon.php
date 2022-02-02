<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * @property int $id
 * @property string $marathon_name
 * @property string $slug
 * @property string $country
 * @property string $city_name
 * @property int $country_id
 * @property Carbon $date_start_marathon
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Marathon extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable() : array {
        return [
            'slug' => [
                'source' => 'marathon_name'
            ]
        ];
    }

    public function events() {
        return $this->hasMany(Event::class);
    }
}
