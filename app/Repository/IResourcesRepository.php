<?php


namespace App\Repository;



interface IResourcesRepository extends IEloquentRepositoryInterface
{

    public function getresourcebyurl($resourceurl);



}
