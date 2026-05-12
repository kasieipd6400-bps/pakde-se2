<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Sls;
use Illuminate\Auth\Access\HandlesAuthorization;

class SlsPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Sls');
    }

    public function view(AuthUser $authUser, Sls $sls): bool
    {
        return $authUser->can('View:Sls');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Sls');
    }

    public function update(AuthUser $authUser, Sls $sls): bool
    {
        return $authUser->can('Update:Sls');
    }

    public function delete(AuthUser $authUser, Sls $sls): bool
    {
        return $authUser->can('Delete:Sls');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Sls');
    }

    public function restore(AuthUser $authUser, Sls $sls): bool
    {
        return $authUser->can('Restore:Sls');
    }

    public function forceDelete(AuthUser $authUser, Sls $sls): bool
    {
        return $authUser->can('ForceDelete:Sls');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Sls');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Sls');
    }

    public function replicate(AuthUser $authUser, Sls $sls): bool
    {
        return $authUser->can('Replicate:Sls');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Sls');
    }

}