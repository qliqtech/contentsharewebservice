<?php


namespace App\Repository\Eloquent;


use App\Models\Content;
use App\Repository\IContentRepositoryInterface;

class ContentRepository extends BaseRepository implements IContentRepositoryInterface
{



    /**
     *
     * @param Content $model
     */
    public function __construct(Content $model)
    {
        parent::__construct($model);
    }
}
