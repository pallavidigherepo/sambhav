<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title','slug','url','parent_id','order','icon','type','competition_category_id','activity_category_id','is_active'
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
    }

    public function activity_category()
    {
        return $this->belongsTo(ActivityCategory::class);
    }

    public function competition_category()
    {
        return $this->belongsTo(CompetitionCategory::class);
    }

    // scope to only active menus
    public function scopeActive($q)
    {
        return $q->where('is_active', true);
    }
}
