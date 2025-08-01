<?php

namespace App\Http\Controllers;
use App\Models\Click;
use App\Models\Link;
use App\Models\ShortenedLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RedirectController extends Controller
{
    public function redirect($slug, Request $request)
    {
        $linkUser = ShortenedLink::where('slug', $slug)->firstOrFail();
        if (!$linkUser->is_active || !$linkUser->link) {
        abort(404, 'Link inativo ou inexistente');
    }
        $linkUser->increment('total_clicks');

        $linkUser->clicks()->create([
            'clicked_at' => now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect($linkUser->link->original_url);
    }
}
