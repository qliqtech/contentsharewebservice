<?php


namespace App\Http\Controllers;



use App\Helpers\CRUDRequestModeEnums;
use App\Helpers\GenerateRandomCharactersHelper;
use App\ImplementationService\ContentService\ContentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{

    public function createcontent(Request $request){

    ///    echo "wiiiii"; die();

        $request->request->add($this->GetUserAgent($request));

        $response = null;

        $allkeys = $request->all();

        $service = App::make(ContentService::class);


            $validator = Validator::make($request->all(), [
                'Title' => 'required|string|max:255',
                'ContentType' => 'required|string|max:30',


            ]);


            if ($validator->fails())
            {
                $response = ['message' => 'validation errors',
                    'usertoken' => null,
                    'errors'=>$validator->errors()->all(),
                    'responsecode' => 203];
                return $response;
            }




            $response =  $service->createcontent($allkeys);




            return $response;

        }




    public function removecontent(Request $request){

        ///    echo "wiiiii"; die();

        $request->request->add($this->GetUserAgent($request));

        $response = null;

        $allkeys = $request->all();

        $service = App::make(ContentService::class);


        $validator = Validator::make($request->all(), [
            'contentid' => 'required|string|min:1',

        ]);


        if ($validator->fails())
        {
            $response = ['message' => 'validation errors',
                'usertoken' => null,
                'errors'=>$validator->errors()->all(),
                'responsecode' => 203];
            return $response;
        }




        $response =  $service->removeContent($allkeys);




        return $response;

    }


}
