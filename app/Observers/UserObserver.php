<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $user->assignRole(request()->role_id);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        $user->assignRole(request()->role_id);
    }

}
