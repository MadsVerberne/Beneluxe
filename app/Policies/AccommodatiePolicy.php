<?php

namespace App\Policies;

use App\Models\Accommodatie;
use App\Models\User;

class AccommodatiePolicy
{
    /**
     * Bepaal of de gebruiker de accommodatie mag bewerken.
     */
    public function update(User $user, Accommodatie $accommodatie): bool
    {
        return $user->id === $accommodatie->gebruiker_id;
    }

    /**
     * Bepaal of de gebruiker de accommodatie mag verwijderen.
     */
    public function delete(User $user, Accommodatie $accommodatie): bool
    {
        return $user->id === $accommodatie->gebruiker_id;
    }

    /**
     * Bepaal of de gebruiker de accommodatie mag bekijken.
     */
    public function view(User $user, Accommodatie $accommodatie): bool
    {
        return $user->id === $accommodatie->gebruiker_id;
    }
}
