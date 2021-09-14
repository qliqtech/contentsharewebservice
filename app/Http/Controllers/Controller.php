<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function GetUserAgent(Request $request){

        //  $useragent = array();



        //   $useragent->requestbody = $request->getContent();


        $useragent = ['userip'=>$request->ip(),
            'userid'=>$request->user()->id,
            'requesturl'=>$request->fullUrl(),
            'browser'=>$request->userAgent(),
            'requestbody'=>$request->getContent()];

        return $useragent;

    }
}
