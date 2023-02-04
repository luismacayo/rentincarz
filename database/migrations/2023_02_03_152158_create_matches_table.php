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
            
            $table->dateTime('match_date');
            $table->bigInteger('match_id')->unique();
            
            $table->string('hometeam_name');
            $table->string('hometeam_shortname');
            $table->string('hometeam_tla')->nullable();
            $table->string('hometeam_crest')->nullable();

            $table->string('awayteam_name');
            $table->string('awayteam_shortname');
            $table->string('awayteam_tla')->nullable();
            $table->string('awayteam_crest')->nullable();

            $table->string('competition_name')->nullable();
            $table->string('competition_type')->nullable();
            $table->string('competition_emblem')->nullable();
            
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
