<?php


namespace App\ImplementationService;


use App\Repository\IAuditTrailRepository;

use App\Repository\IUserRepositoryInterface;
use Illuminate\Support\Facades\App;

class BaseImplementationService
{
    public $userrepository,$auditTrailRepository,$projectRepository,$apirepository,$requestparameters;

    public function __construct(
                                IUserRepositoryInterface $userRepository,
                                IAuditTrailRepository $auditTrailRepository

    )
    {


        $this->userrepository = $userRepository;
        $this->auditTrailRepository = $auditTrailRepository;



    }


    public function AuditActivity($params){

        $auditservice = App::make(AuditService\AuditService::class);




        $auditservice->SaveAudit($params);
    }



    public function CheckifUserIsActiveOrDeactivated($userid){


        $userdeteails = $this->userrepository->find($userid);

        if($userdeteails->IsActive == True){


            return true;
        }

        return false;

    }


}
