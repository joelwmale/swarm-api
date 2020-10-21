<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PlayerTeam;
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
