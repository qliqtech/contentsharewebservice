<?php

namespace App\ImplementationService\ContentService;


use App\Helpers\AuditEnums;
use App\Helpers\GenerateRandomCharactersHelper;
use App\ImplementationService\BaseImplementationService;

class ContentService extends BaseImplementationService
{



    public function createContent($requestparams){

     //   $userid = $requestparams["userid"];

      //  $requestparams =  array_add($requestparams,'createdby',$userid);


        $requestparams =  array_add($requestparams,'IsActive',true);

        $requestparams =  array_add($requestparams,'IsDeleted',false);


        $this->contentrepository->create($requestparams);


        $requestparams =  array_add($requestparams,'actionid',AuditEnums::ContentCreated);

        $requestparams =  array_add($requestparams,'activityname',"Content Added");


        $this->AuditActivity($requestparams);

        return $response = [
            "responsecode"=>"200",
            "message"=>"Content Created Successfully",

        ];

    }




    public function removeContent($requestparams){

           $userid = $requestparams["userid"];

           $contentid = (int)$requestparams["contentid"];

        $requestparams =  array_add($requestparams,'IsActive',true);

        $requestparams =  array_add($requestparams,'IsDeleted',false);


     //   dd($contentid);
        //check ownership
        //check if user has admin role

        $this->CheckOwnership($contentid,$userid);


        $this->contentrepository->delete($contentid,$userid);


        $requestparams =  array_add($requestparams,'actionid',AuditEnums::ContentDeleted);

        $requestparams =  array_add($requestparams,'activityname',"Content Deleted");


        $this->AuditActivity($requestparams);

        return $response = [
            "responsecode"=>"200",
            "message"=>"Content Removed Successfully",

        ];

    }





}
