<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Kabupaten;
use Illuminate\Auth\Access\HandlesAuthorization;

class KabupatenPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Kabupaten');
    }

    public function view(AuthUser $authUser, Kabupaten $kabupaten): bool
    {
        return $authUser->can('View:Kabupaten');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Kabupaten');
    }

    public function update(AuthUser $authUser, Kabupaten $kabupaten): bool
    {
        return $authUser->can('Update:Kabupaten');
    }

    public function delete(AuthUser $authUser, Kabupaten $kabupaten): bool
    {
        return $authUser->can('Delete:Kabupaten');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Kabupaten');
    }

    public function restore(AuthUser $authUser, Kabupaten $kabupaten): bool
    {
        return $authUser->can('Restore:Kabupaten');
    }

    public function forceDelete(AuthUser $authUser, Kabupaten $kabupaten): bool
    {
        return $authUser->can('ForceDelete:Kabupaten');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Kabupaten');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Kabupaten');
    }

    public function replicate(AuthUser $authUser, Kabupaten $kabupaten): bool
    {
        return $authUser->can('Replicate:Kabupaten');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Kabupaten');
    }

}