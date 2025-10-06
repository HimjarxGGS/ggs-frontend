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
        'after_movie_url',
        'sertif_url',
    ];

    protected $casts = [
        'event_date' => 'date',
        'need_registrant_picture' => 'boolean',
    ];

    public function getEventDescription()
    {
        return new HtmlString($this->description);
    }

    public function getEmbedAfterMovieURL()
    {
        $url = $this->after_movie_url;

        if (!$url) {
            return null;
        }

        // Normalize URL
        $parsedUrl = parse_url(trim($url));
        $videoId = null;

        // Case 1: https://www.youtube.com/watch?v=KmOVNVZEP9o
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
            if (isset($queryParams['v'])) {
                $videoId = $queryParams['v'];
            }
        }

        // Case 2: https://youtu.be/KmOVNVZEP9o
        if (!$videoId && isset($parsedUrl['host']) && str_contains($parsedUrl['host'], 'youtu.be')) {
            $videoId = ltrim($parsedUrl['path'], '/');
        }

        // Case 3: https://www.youtube.com/shorts/KmOVNVZEP9o or /embed/
        if (!$videoId && isset($parsedUrl['path'])) {
            $pathParts = explode('/', trim($parsedUrl['path'], '/'));
            if (in_array($pathParts[0], ['shorts', 'embed']) && isset($pathParts[1])) {
                $videoId = $pathParts[1];
            }
        }

        // Return formatted embed URL if video ID found
        if ($videoId) {
            return "https://www.youtube.com/embed/" . $videoId;
        }

        // Otherwise return original (fallback)
        return $url;
    }
}
