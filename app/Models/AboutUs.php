<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AboutUs
 *
 * @property int $id
 * @property string|null $title
 * @property string $body
 * @property string|null $images
 * @property string|null $videoes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs query()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereVideoes($value)
 * @mixin \Eloquent
 */
class AboutUs extends Model
{
    use HasFactory;
}
