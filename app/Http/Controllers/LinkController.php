<?php

namespace App\Http\Controllers;

use App\Models\ShortenedLink;
use Illuminate\Support\Facades\Auth;
use App\Models\Link;
class LinkController extends Controller
{
    public function showLinks()
    {
        $user = Auth::user();

        $nameParts = explode(' ', $user->name);
        $firstName = $nameParts[0] ?? '';
        $lastName = $nameParts[1] ?? '';
        $fullName = trim($firstName . ' ' . $lastName);

        $links = $user->shortenedLinks()->with('link')->get();

        return view('links', compact('user', 'links', 'fullName'));
    }

    public function destroy(ShortenedLink $shortenedLink)
    {
        $shortenedLink->delete();
        return response()->json([
            'sucess' => true,
            'message' => 'Link deletado com sucesso'
        ]);
    }
}
