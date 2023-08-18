<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HashController extends Controller
{
    public function index($word = "",$hash = ""){
        return view('index',["word" => $word, "hash" => $hash]);
    }

    public function traduction(Request $request){
        if($request->word != null){
            $hash = Hash::make($request->word);
            return $this->index($request->word,$hash);
        }
        else{
            session_start();
            $_SESSION['error']['mensage']   = "Traduction error";
                return redirect()->route('login');
        }
    }
}
