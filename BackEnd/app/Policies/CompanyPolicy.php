<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Company $company)
    {
        return $user;
    }

    public function create(User $user)
    {
        return $user;
    }

    public function store(User $user)
    {
        return $user;
    }


    public function edit(User $user, Company $company)
    {
        return $user->id === $company->user_id;
    }

    public function update(User $user, Company $company)
    {
        return $user->id === $company->user_id;
    }

    public function delete(User $user, Company $company)
    {
        return $user->id === $company->user_id;
    }

}
