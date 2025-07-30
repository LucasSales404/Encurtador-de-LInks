<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
   public function about()
   {

      $user = Auth::user();
      $name = $user->name;
      $parts = explode(' ', $name);
      $firstName = $parts[0] ?? '';
      $lastName = $parts[1] ?? '';
      $fullName = trim($firstName . ' ' . $lastName);
      $links = auth()->user()->links()->get();

      return view('about', compact('user', 'links', 'fullName'));
   }
}


