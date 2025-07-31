<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
   public function send(Request $request){
      $request->validate([
         'email' => 'required',
         'message' => 'required',
         'g-recaptcha-response' => 'required'
         ]);

         $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
            'secret' => env('RECAPTCHA_SECRET'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip()
         ]);
         $googleResponse = $response->json();
         if(!$googleResponse['success']){
            return response()->json([
               'success'=> false,
               'message'=> 'A validação do reCAPTCHA falhou, tente novamente.'
            ]);
         }
         return response()->json([
            'success'=> true,
            'message'=> 'Mensagem enviada com sucesso'   
         ]);
   }
}


