<?php

namespace App\Models;

use App\Models\Brand as ModelsBrand;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $name
 * @property int $parent_brand_id
 * @property string|null $color
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereParentBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Brand $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Brand findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand withoutTrashed()
 * @mixin \Eloquent
 */
class Brand extends Model {
    use HasFactory , SoftDeletes , Sluggable;

    protected $fillable = ['name', 'parent_brand_id', 'color', 'description', 'slug'];

    protected $timestamp = true;

    public function parent(): BelongsTo {
        return $this->belongsTo(ModelsBrand::class, 'parent_brand_id');
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => ['name'],
            ],
        ];
    }
}
