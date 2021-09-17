<?php


namespace App\Repository\Eloquent;


use App\Models\Resource;
use App\Repository\IResourcesRepository;

class ResourceRepository extends BaseRepository implements IResourcesRepository
{



    /**
     *
     * @param Resource $model
     */
    public function __construct(Resource $model)
    {
        parent::__construct($model);
    }


    public function getresourcebyurl($resourceurl)
    {


        return Resource::where('resourceurl',$resourceurl)->first();
    }
}
