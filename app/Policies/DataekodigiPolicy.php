<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Dataekodigi;
use Illuminate\Auth\Access\HandlesAuthorization;

class DataekodigiPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Dataekodigi');
    }

    public function view(AuthUser $authUser, Dataekodigi $dataekodigi): bool
    {
        return $authUser->can('View:Dataekodigi');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Dataekodigi');
    }

    public function update(AuthUser $authUser, Dataekodigi $dataekodigi): bool
    {
        return $authUser->can('Update:Dataekodigi');
    }

    public function delete(AuthUser $authUser, Dataekodigi $dataekodigi): bool
    {
        return $authUser->can('Delete:Dataekodigi');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Dataekodigi');
    }

    public function restore(AuthUser $authUser, Dataekodigi $dataekodigi): bool
    {
        return $authUser->can('Restore:Dataekodigi');
    }

    public function forceDelete(AuthUser $authUser, Dataekodigi $dataekodigi): bool
    {
        return $authUser->can('ForceDelete:Dataekodigi');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Dataekodigi');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Dataekodigi');
    }

    public function replicate(AuthUser $authUser, Dataekodigi $dataekodigi): bool
    {
        return $authUser->can('Replicate:Dataekodigi');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Dataekodigi');
    }

}