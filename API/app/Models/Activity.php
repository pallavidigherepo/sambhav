<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    // You can define other properties or methods as needed
    // For example, if you have timestamps or fillable attributes, you can add them here
    protected $fillable = [
        'name',
        'code',
        'description',
        'start_date',
        'end_date',
        'location',
        'organizer_name',
        'organizer_email',
        'organizer_phone',
        'organizer_website',
        'city_id',
        'event_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'slug',
        'status',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
