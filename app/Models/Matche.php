<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class Matche extends Model
{
    //use HasFactory;

    protected $fillable = [
        'match_id',
        'match_date',
        'hometeam_name',
        'hometeam_shortname',
        'hometeam_tla',
        'hometeam_crest',
        'awayteam_name',
        'awayteam_shortname',
        'awayteam_tla',
        'awayteam_crest',
        'winner',
        'duration',
    ];

        /**
     * Interact with the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function matchDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => Carbon::parse($value)->toDateTimeString(),
        );
    }

    public static function getNextDayMatches()
    {
        $matches = self::next(1)->get();
        return $matches;
    }
    
    public static function getNextWeekMatches()
    {
        $matches = self::next(7)->get();
        return $matches;
    }


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

    /**
     * Scope a query to get next matches
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNext($query, $days = 0)
    {
        $today = Carbon::now()->toDateString();
        $until = Carbon::now()->addDays($days)->toDateString();
        return $query->whereDate('match_date', '>=', $today)->whereDate('match_date', '<=', $until);
    }


}
