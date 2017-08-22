<?php
namespace App\Http\Services;

use App\Http\Repositories\PermissionRepository;

class PermissionService
{
    protected $user;

    public function __construct(PermissionRepository $user)
    {
        $this->user = $user;
    }

    public function getUserModel()
    {
        return $this->user->getUserModel();
    }

}