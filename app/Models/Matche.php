<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class Matche extends Model
{
    //use HasFactory;
    
    protected $fillable = [
        'match_id',
        'homeTeam_name',
        'homeTeam_shortname',
        'homeTeam_tla',
        'homeTeam_crest',
        'awayTeam_name',
        'awayTeam_shortname',
        'awayTeam_tla',
        'awayTeam_crest',
        'winner',
        'duration',
    ];


    public static function getMatchs()
    {
        $from = Carbon::now()->toDateString();
        $until = Carbon::now()->addDays(4)->toDateString();

        $request = Http::withHeaders([
            'X-Auth-Token' => '089e803119da45d1b0481224b6c1f601',
            'Accept' => 'application/json',
        ])->get('https://api.football-data.org/v4/matches',[
            'dateFrom' => $from,
            'dateTo' => $until
        ]);

        if( $request->successful() )
        {
            return $request->collect();
        }
        return [];
    }


}
