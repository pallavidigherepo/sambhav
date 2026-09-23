<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasRecursiveRelationships;

    protected $fillable = [
        'name',
        'code',
        'slug',
        'icon',
        'description',
        'status',
        'parent_id',
        'type',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Boot the model and define model event hooks.
     *
     * The 'created' event creates a corresponding menu entry for the service,
     * while the 'deleted' event removes any menu entries associated with the service.
     */

    protected static function booted()
    {
        static::created(function ($category) {
            \App\Models\Menu::create([
                'title' => $category->name,
                'slug' => $category->slug,
                'url' => $category->type.'/' . $category->slug,
                'type' => $category->type,
                'category_id' => $category->id,
                'parent_id' => $category->parent_id,
                'order' => 0,
            ]);
        });

        static::deleted(function ($category) {
            Menu::where('id', $category->id)->delete();
        });
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function parent() :BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children() :HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function activities() :HasMany
    {
        return $this->hasMany(Activity::class);
    }

    public function competitions() :HasMany
    {
        return $this->hasMany(Competition::class);
    }

    public function getTreePathAttribute()
    {
        return $this->parent 
            ? $this->parent->tree_path . ' > ' . $this->name 
            : $this->name;
    }

    public function getParentKeyName()
    {
        return 'parent_id';
    }

}
