<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function accueil(){
        $listecinqseries = Serie::orderBy('note', 'desc') ->take(5) ->get();
        return view('welcome',['series'=>$listecinqseries]);
    }
}
