<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('match_id')->unique();
            
            $table->string('homeTeam_name');
            $table->string('homeTeam_shortname');
            $table->string('homeTeam_tla');
            $table->string('homeTeam_crest');

            $table->string('awayTeam_name');
            $table->string('awayTeam_shortname');
            $table->string('awayTeam_tla');
            $table->string('awayTeam_crest');
            
            $table->string('winner')->nullable();
            $table->string('duration')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
};
