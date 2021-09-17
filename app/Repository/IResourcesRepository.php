<?php


namespace App\Repository;


use Illuminate\Support\Collection;

interface IResourcesRepository extends IEloquentRepositoryInterface
{

    public function getresourcebyurl($resourceurl);



}
