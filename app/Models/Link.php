<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'original_url',
    ];
    public function users()
{
     return $this->belongsToMany(User::class)->withPivot('slug', 'clicks')->withTimestamps();
}

}
