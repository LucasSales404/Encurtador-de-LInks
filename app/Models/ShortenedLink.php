<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortenedLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'user_id',
        'guest_id',
        'link_id',
        'ip_address',
        'total_clicks',
        'is_active',
        'user_agent'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'total_clicks' => 'integer',
    ];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }

    public function user()
    {
        return $this->belongsTo(related: User::class);
    }

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }

    public function registerClick(array $data)
    {
        $this->clicks()->create($data);
        $this->increment('total_clicks');
    }
}
