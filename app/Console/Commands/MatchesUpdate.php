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
        $results = Matche::getMatchs();

        foreach ($results['matches'] as $result) {
            Matche::updateOrCreate([
                'match_id' => $result['id']
            ],[
                'homeTeam_name' => $result['homeTeam']['name'],
                'homeTeam_shortname' => $result['homeTeam']['shortName'],
                'homeTeam_tla' => $result['homeTeam']['tla'],
                'homeTeam_crest' => $result['homeTeam']['crest'],
                'awayTeam_name' => $result['awayTeam']['name'],
                'awayTeam_shortname' => $result['awayTeam']['shortName'],
                'awayTeam_tla' => $result['awayTeam']['tla'],
                'awayTeam_crest' => $result['awayTeam']['crest'],
                'winner' => $result['score']['winner'],
                'duration' => $result['score']['duration'],
            ]);
        }

        

        $this->output->success("Partidos actualizados (" . count($results['matches']) .")");

        
        
        return Command::SUCCESS;
    }
}
