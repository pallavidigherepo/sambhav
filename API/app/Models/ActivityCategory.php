<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'status',
        'parent_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
