<?php

namespace App\Http\Controllers;

use App\Models\Matche;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $results = Matche::today();
        
        return view('matches.index',[
            'results' => $results->paginate(10),
            'time_str' => "Hoy",
        ]);
    }

    public function nextday(Request $request): View
    {
        $results = Matche::next(1);
        return view('matches.index',[
            'results' => $results->paginate(10),
            'time_str' => "Mañana",
        ]);
    }

    public function week(Request $request): View
    {
        $results = Matche::next(7);
        return view('matches.index',[
            'results' => $results->paginate(10),
            'time_str' => "esta Semana",
        ]);
    }


    public function past(Request $request): View
    {
        $results = Matche::past();
        return view('matches.index',[
            'results' => $results->paginate(10),
            'time_str' => "pasados",
        ]);
    }
}
