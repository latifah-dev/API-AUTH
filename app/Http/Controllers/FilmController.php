<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
class FilmController extends Controller
{
    function join() {
        //deklarasi table yang digunakan
        $films = Film::query()
        //join genre on genres.id = film.id_genre
        ->join("genres", "genres.id", "=", "films.id_genre")

        //filtering data yang diambil menggunakan ->where() {}


        //menspesifikasikan data yang akan diambil
        ->select(
            "films.id",
            "films.title",
            DB::raw("genres.nama as genre")
        )

        //ordering dan grouping
        ->orderByDesc("films.title")
        ->get();
        return response()->json($films);
    }
    function leftJoin() {

    }
    function rightJoin() {

    }
    function count() {
        //daftar genre beserta jumlah filmnya
        $genres = Genre::query()
        ->leftjoin("films", "films.id_genre", "=", "genres.id" )
        ->select(
            "genres.id",
            "genres.nama",
            DB::raw("count(films.id)")
        )
        ->groupBy("genres.id") 
        ->get();
        return response()->json($genres);

    }
}
