<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SearchHistory
 *
 * @property int $id
 * @property int $user_id
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory whereUserId($value)
 * @mixin \Eloquent
 */
class SearchHistory extends Model {
    use HasFactory;
}
