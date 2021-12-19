<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SeriesController extends Controller
{

    public function listeSerie(){
        $series = Serie::all();
        return view('listeSerie', ['series'=>$series]);
    }

    public function detailSerie($id) {
        $serie = Serie::findOrFail($id);
        return view('detailSerie', ['serie'=>$serie]);
    }

    public function commenter(Request $request) {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->validated = 0;
        $comment->note = $request->input("notes");
        $comment->content= $request->input("comments");
        $comment->serie_id= $request->input("serie_id");
        $comment->save();
        return back();

    }

    public function episodeVu($id) {
        $pdo = DB::getPDO();

        $sql = "INSERT into seen values(?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute([Auth::id(), $id, date("Y-m-d")]);
        return back();
    }

    // INSERT INTO seen SELECT ?,id,? FROM episode WHERE serie_id=?


}