<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [
        'shortened_link_id',
        'ip_address',
        'user_agent',
        'referrer',
        'clicked_at'
    ];

    protected $casts = [
        'clicked_at' => 'datetime',
    ];

    public function shortenedLink()
    {
        return $this->belongsTo(ShortenedLink::class);
    }
}


