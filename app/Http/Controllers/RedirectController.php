<?php

namespace App\Http\Controllers;
use App\Models\Link; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RedirectController extends Controller
{
    public function redirect($slug)
    {
        $linkUser = DB::table('link_user')->where('slug', $slug)->first();

        if (!$linkUser) {
            abort(404);
        }

        DB::table('link_user')->where('slug', $slug)->increment('clicks');

        $link = Link::find($linkUser->link_id);

        if (!$link) {
            abort(404);
        }

        return redirect($link->original_url);
    }
}
