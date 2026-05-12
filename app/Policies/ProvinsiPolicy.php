<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Provinsi;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProvinsiPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Provinsi');
    }

    public function view(AuthUser $authUser, Provinsi $provinsi): bool
    {
        return $authUser->can('View:Provinsi');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Provinsi');
    }

    public function update(AuthUser $authUser, Provinsi $provinsi): bool
    {
        return $authUser->can('Update:Provinsi');
    }

    public function delete(AuthUser $authUser, Provinsi $provinsi): bool
    {
        return $authUser->can('Delete:Provinsi');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Provinsi');
    }

    public function restore(AuthUser $authUser, Provinsi $provinsi): bool
    {
        return $authUser->can('Restore:Provinsi');
    }

    public function forceDelete(AuthUser $authUser, Provinsi $provinsi): bool
    {
        return $authUser->can('ForceDelete:Provinsi');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Provinsi');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Provinsi');
    }

    public function replicate(AuthUser $authUser, Provinsi $provinsi): bool
    {
        return $authUser->can('Replicate:Provinsi');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Provinsi');
    }

}