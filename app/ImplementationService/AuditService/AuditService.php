<?php


namespace App\ImplementationService\AuditService;


use App\ImplementationService\BaseImplementationService;

class AuditService extends BaseImplementationService
{

    public function SaveAudit($attributes){

        $datatosave = $attributes;


        //  dd($datatosave);

        //    $datatosave->add('','');




        $this->auditTrailRepository->create($datatosave);

    }

}
