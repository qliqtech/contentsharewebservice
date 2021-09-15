<?php


namespace App\Http\Controllers;


use App\Helpers\CRUDRequestModeEnums;
use App\Helpers\GenerateRandomCharactersHelper;
use App\ImplementationService\UsersService;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{

    public function createuser(){




    }



    public function CreateOrEditUser(Request $request){

        $request->request->add($this->GetUserAgent($request));

        $response = null;


        $allkeys = $request->all();

        $service = App::make(UsersService::class);


        if($allkeys['Mode'] == CRUDRequestModeEnums::Create){



            $validator = Validator::make($request->all(), [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'phonenumber' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                //   'password' => 'required|string|min:6|confirmed',
            ]);


            if ($validator->fails())
            {
                $response = ['message' => 'validation errors',
                    'usertoken' => null,
                    'errors'=>$validator->errors()->all(),
                    'responsecode' => 203];
                return $response;
            }


            $rawpassword = GenerateRandomCharactersHelper::incrementalHash();

            $hashedpassword = Hash::make($rawpassword);

            $allkeys =  array_add($allkeys,'password',$hashedpassword);

            $allkeys =  array_add($allkeys,'rawpassword',$rawpassword);

            $response =  $service->createUser($allkeys);




        }


        if($allkeys['Mode'] == CRUDRequestModeEnums::Edit){



        }






        return $response;

    }



    public function ListUsers(Request $request){

     //   $request->request->add($this->GetUserAgent($request));




        $response = null;

        $allkeys = $request->all();


        $service = App::make(UsersService\UsersService::class);


        $response =  $service->listusers($allkeys);



        return $response;

    }


}
