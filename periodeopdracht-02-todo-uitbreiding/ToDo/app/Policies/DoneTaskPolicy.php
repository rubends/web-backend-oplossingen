<?php

namespace App\Policies;
use App\User;
use App\DoneTask;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoneTaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function destroy(User $user, DoneTask $task)
    {
        return $user->id === $task->user_id;
    }
}
