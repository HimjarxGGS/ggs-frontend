<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\HtmlString;

class Event extends Model
{
    use SoftDeletes;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'description',
        'event_date',
        'status',
        'event_format',
        'location',
        'poster',
        'need_registrant_picture',
    ];

    protected $casts = [
        'event_date' => 'date',
        'need_registrant_picture' => 'boolean',
    ];

    public function getEventDescription()
    {
        return new HtmlString($this->description);
    }
}
