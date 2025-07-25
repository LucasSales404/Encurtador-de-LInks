<?php

namespace App\Http\Controllers;
use App\Models\Link; 
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect($slug){
        $link = Link::whereHas("users", function($query) use($slug){
            $query->where("slug",$slug);
        })->first();

        if(!$link){
            abort(404);
        }

        return redirect($link->original_url);
    }
}
