<?php

namespace App\ImplementationService\UsersService;

//use App\ExternalApis\SMSApi;
use App\Helpers\AuditEnums;
use App\Helpers\GenerateRandomCharactersHelper;
use App\Helpers\PaginationHelper;
use App\Models\ResourcesUserroles;


class UsersService extends \App\ImplementationService\BaseImplementationService
{




    public function createUser($requestparams){

        $userid = $requestparams["userid"];

        $requestparams =  array_add($requestparams,'createdby',$userid);

        $remembertoken = GenerateRandomCharactersHelper::generaterandomAlphabets(10);



      //  $rawpassword = $requestparams['rawpassword'];

        //do password confirmation check


        $requestparams =  array_add($requestparams,'created_by',$userid);

        $requestparams =  array_add($requestparams,'IsActive',true);

        $requestparams =  array_add($requestparams,'IsDeleted',false);


        $requestparams =  array_add($requestparams,'remember_token',$remembertoken);

        $requestparams =  array_add($requestparams,'requirepasswordreset',true);



      //  if(!$this->CheckifUserIsActiveOrDeactivated($userid)){

      //      return $response = [
      //          "responsecode"=>"201",
      //          "message"=>"User is deactivated",
//
      //      ];

      //  }

        $this->userrepository->create($requestparams);


        $requestparams =  array_add($requestparams,'actionid',AuditEnums::UserCreated);

        $requestparams =  array_add($requestparams,'activityname',"User Created");

        //send credentials

       //  die();

        $this->AuditActivity($requestparams);

        return $response = [
            "responsecode"=>"200",
            "message"=>"User Created Successfully",

        ];

    }



    public function listusers($requestparams){



        $listofusers = $this->userrepository;

        $data = PaginationHelper::paginate($listofusers->all());


        return $response = [
            "responsecode"=>"200",
            "userlist"=>$data,
            "message"=>"Users list",

        ];
    }

    public function checkuserrolepermission($requestparams){

        $roleid = $requestparams["userroleid"];

        $url = $requestparams["url"];

        //get current resource id

        $resource = $this->resourcesreopsitory->getresourcebyurl($url);

     //   dd($roleid);

        if($resource == null){

            return "resource does not exist";

        }

       $userresource = ResourcesUserroles::where('roleid',$roleid)->where('resourceid',$resource->id)->first();

        if($userresource==null){

            return "Permission denied";

        }

        return "true";
    }



}
