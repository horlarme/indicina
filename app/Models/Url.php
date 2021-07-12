<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * Class Url
 * @package App\Models
 * @mixin Builder
 *
 * @property string $id
 * @property string $url
 * @property integer $hits
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Url extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded = [];

    protected static function boot()
    {
        self::creating(function (Url $model) {
            $characterLength = random_int(10, 30);

            $model->id = Str::random($characterLength);
        });
    }
}
