<?php


namespace App\Repository\Eloquent;


use App\Models\Resource;
use App\Repository\ITestRepositoryInterface;

class TestRepository extends BaseRepository implements ITestRepositoryInterface
{



    /**
     *
     * @param Test $model
     */
    public function __construct(Test $model)
    {
        parent::__construct($model);
    }



}

