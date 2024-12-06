<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerStatsTable extends Migration
{
    public function up()
    {
        Schema::create('player_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('students_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('tournament_id')->constrained()->onDelete('cascade');
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->string('position');
            $table->integer('minutes_played')->default(0);
            $table->boolean('is_starter')->default(false);
            $table->boolean('received_amonestation')->default(false);
            $table->string('amonestation_type')->nullable();
            $table->boolean('has_injury')->default(false);
            $table->integer('injury_duration')->nullable(); // duración en días
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('player_stats');
    }
}
