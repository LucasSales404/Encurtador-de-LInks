<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortenedLinkRequest;
use App\Models\Link;
use App\Models\ShortenedLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ShortenedLinkController extends Controller
{
    public function store(ShortenedLinkRequest $request)
    {
        $slug = $request->slug ?: Str::random(6);

        if (
            $request->filled('slug') &&
            ShortenedLink::where('slug', $request->slug)->exists()
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Essa personalização já existe, tente usar outra'
            ], 422);
        }

        $link = Link::firstOrCreate([
            'original_url' => $request->original_url
        ]);
        $shortened = ShortenedLink::create([
            'slug' => $slug,
            'link_id' => $link->id,
            'user_id' => Auth::id(),
            'guest_id' => Auth::check() ? null : $this->getGuestId($request),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Link criado com sucesso',
            'short_url' => route('redirect', ['slug' => $shortened->slug]),
            'slug' => $shortened->slug,
            'original_url' => $link->original_url
        ]);
    }
    private function getGuestId(Request $request)
    {

        if (!$request->session()->has('guest_id')) {
            // Gera um UUID e guarda na sessão
            $request->session()->put('guest_id', (string) Str::uuid());
        }

        return $request->session()->get('guest_id');
    }
}

