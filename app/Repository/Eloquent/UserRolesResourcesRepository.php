<?php


namespace App\Repository\Eloquent;


use App\Models\ResourcesUserroles;
use App\Repository\IUserRolesResourcesRepository;

class UserRolesResourcesRepository extends BaseRepository implements IUserRolesResourcesRepository
{

    /**
     * UserRepository constructor.
     *
     * @param ResourcesUserroles $model
     */
    public function __construct(ResourcesUserroles $model)
    {
        parent::__construct($model);
    }

}
