<?php


namespace App\ImplementationService;


use App\Repository\IAuditTrailRepository;

use App\Repository\IContentRepositoryInterface;
use App\Repository\IResourcesRepository;
use App\Repository\IUserRepositoryInterface;
use App\Repository\IUserRolesRepository;
use App\Repository\IUserRolesResourcesRepository;
use Illuminate\Support\Facades\App;

class BaseImplementationService
{
    public $userrepository,
        $auditTrailRepository,
        $apirepository,
        $requestparameters,
        $resourcesreopsitory,
        $userrolesrepository,
        $userroesresourcesrepository,
        $contentrepository;

    public function __construct(
                                IUserRepositoryInterface $userRepository,
                                IAuditTrailRepository $auditTrailRepository,
                                IResourcesRepository $resourcesRepository,
                                IUserRolesRepository $userRolesRepository,
                                IUserRolesResourcesRepository $userRolesResourcesRepository,
                                IContentRepositoryInterface $contentRepository





    )
    {


        $this->userrepository = $userRepository;
        $this->auditTrailRepository = $auditTrailRepository;
        $this->resourcesreopsitory = $resourcesRepository;
        $this->userrolesrepository = $userRolesRepository;
        $this->userroesresourcesrepository = $userRolesResourcesRepository;
        $this->contentrepository = $contentRepository;



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



    public function CheckOwnership($contentid,$userid){


        if(!$this->contentrepository->checkownership($contentid,$userid)){


            die('Not owner');

        }

    }




}
