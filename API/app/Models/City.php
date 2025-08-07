<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    // You can define other properties or methods as needed
    // For example, if you have timestamps or fillable attributes, you can add them here
    protected $fillable = [
        'name',
        'code',
        'state_id',
        'country_id',
        'description',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'slug',

    ];


}
