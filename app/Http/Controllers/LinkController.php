<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use Illuminate\Support\Str;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkController extends Controller
{

    public function store(LinkRequest $request)
    {
        $slug = $request->caminho ?? Str::random(6);

        while (DB::table('link_user')->where('slug', $slug)->exists()) {
            $slug = Str::random(6);
        }

        $link = Link::firstOrCreate([
            'original_url' => $request->url
        ]);

        auth()->user()->links()->syncWithoutDetaching([$link->id => ['slug' => $slug]]);

        return response()->json([
            'short_url' => url($slug),
            'link' => $link
        ]);
    }

}
