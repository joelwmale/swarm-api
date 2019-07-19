<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Swarm\Players\Player;
use Swarm\Resources\PlayerTeamResource;
use Swarm\Players\PlayerTeam;
use Swarm\Maps\DungeonTeamMapper;

class PlayerTeamController extends Controller
{
    /**
     * Get a users teams
     */
    public function index(Request $request)
    {
        // $user = User::all()->first();
        $player = Player::all()->first();

        return PlayerTeamResource::collection($player->teams);
    }

    /**
     * Retrieve a players team
     *
     * @param Request $request
     * @param PlayerTeam $team
     *
     * @return array
     */
    public function show(Request $request, PlayerTeam $team)//: array
    {
        dd(DungeonTeamMapper::getTypeSubTypeForDungeon('Arena'));
        return $team->getResource();
    }
}
