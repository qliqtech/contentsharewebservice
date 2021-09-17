<?php


namespace App\Repository\Eloquent;


use App\Models\Userroles;
use App\Repository\IUserRolesRepository;

class UserRolesRepository extends BaseRepository implements IUserRolesRepository
{

    /**
     *
     * @param Userroles $model
     */
    public function __construct(Userroles $model)
    {
        parent::__construct($model);

    }

}
