<?php


namespace App\Repository\Eloquent;



use App\AuditTrail;
use App\Repository\IAuditTrailRepository;

class AuditTrailRepository extends BaseRepository implements IAuditTrailRepository
{



    /**
     *
     * @param AuditTrail $model
     */
    public function __construct(AuditTrail $model)
    {
        parent::__construct($model);
    }

}
