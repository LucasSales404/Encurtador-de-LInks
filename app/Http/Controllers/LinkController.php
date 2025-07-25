<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    public function store(LinkRequest $request, )
    {
        $slug = $request->caminho ?? Str::random(6);

        while (Link::where('slug', $slug)->exists()) {
            $slug = Str::random(6);
        }
         $link = Link::create([
            'user_id' => auth()->id(),
            'original_url' => $request->url,
            'slug' => $slug
        ]);
           return response()->json([
            'short_url' => url($slug),
            'link' => $link
        ]);
    }
}
