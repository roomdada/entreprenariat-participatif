<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, HasSlug, HasEagerLimit;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'identifier';
    }

    public function domaine(): BelongsTo
    {
        return $this->belongsTo(Domaine::class);
    }

  

    public function projectOwner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function identifier(): Attribute
    {
        return new Attribute(
            set: fn () => 'PJT-'.Str::random(5)
        );
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
          ->generateSlugsFrom('title')
          ->saveSlugsTo('slug');
    }
}
