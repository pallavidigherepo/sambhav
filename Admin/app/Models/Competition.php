<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'name',
        'code',
        'category_id',
        'description',
        'start_date',
        'end_date',
        'location',
        'organizer_name',
        'organizer_email',
        'organizer_phone',
        'organizer_website',
        'contact_info',
        'image',
        'video',
        'rules',
        'prize',
        'terms_and_conditions',
        'registration_fee',
        'registration_deadline',
        'eligibility_criteria',
        'judging_criteria',
        'sponsorship_info',
        'social_media_links',
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
