<?php

namespace Swarm\Policies;

use Swarm\Users\User;
use Swarm\Players\PlayerTeam;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlayerTeamPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return $user->isAdmin ?: null;
    }

    public function index(User $user)
    {
        return true;
    }

    public function show(User $user, PlayerTeam $team)
    {
        return $user->players->contains('player_id', $team->player_id);
    }
}
