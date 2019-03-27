<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Swarm\Players\Player;
use Swarm\Resources\PlayerTeamResource;
use Swarm\Users\User;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        // $user = User::all()->first();
        $player = Player::all()->first();

        return PlayerTeamResource::collection($player->teams);
    }
}
