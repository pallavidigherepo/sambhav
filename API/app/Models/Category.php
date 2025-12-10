<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function competitions()
    {
        return $this->hasMany(Competition::class);
    }


}
