<?php


namespace App\ImplementationService\AuditService;


use App\ImplementationService\BaseImplementationService;

class AuditService extends BaseImplementationService
{

    public function SaveAudit($attributes){

        $datatosave = $attributes;





        $this->auditTrailRepository->create($datatosave);

    }

}
