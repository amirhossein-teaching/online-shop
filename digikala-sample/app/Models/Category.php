<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category for items grouping.
 *
 * @package App\Models
 */
class Category extends Model
{
    // Traits
    use HasFactory;

    /**
     * Category fillable parts.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'parent_id',
        'icon'
    ];

    /**
     * Each category can have a parent.
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Each category has sub categories.
     *
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}