<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Matche;

class MatchesUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'matches:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all Matches From API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->output->title("Actualizando partidos...");
        $results = Matche::updateMatches();

        foreach ($results['matches'] as $result) {
            Matche::updateOrCreate([
                'match_id' => $result['id']
            ],[
                'match_date' => $result['utcDate'],
                'hometeam_name' => $result['homeTeam']['name'],
                'hometeam_shortname' => $result['homeTeam']['shortName'],
                'hometeam_tla' => $result['homeTeam']['tla'],
                'hometeam_crest' => $result['homeTeam']['crest'],
                'awayteam_name' => $result['awayTeam']['name'],
                'awayteam_shortname' => $result['awayTeam']['shortName'],
                'awayteam_tla' => $result['awayTeam']['tla'],
                'awayteam_crest' => $result['awayTeam']['crest'],
                'competition_name' => $result['competition']['name'],
                'competition_type' => $result['competition']['type'],
                'competition_emblem' => $result['competition']['emblem'],
                'winner' => $result['score']['winner'],
                'duration' => $result['score']['duration'],
            ]);
        }



        $this->output->success("Partidos actualizados (" . count($results['matches']) .")");

        
        
        return Command::SUCCESS;
    }
}
