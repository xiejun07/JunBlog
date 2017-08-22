<?php
namespace App\Http\Repositories;

use App\Http\Models\User;

class PermissionRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUserModel()
    {
        return $this->user;
    }
}