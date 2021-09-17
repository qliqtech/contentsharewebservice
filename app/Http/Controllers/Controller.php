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

        $userid = null;

        if($request->user() != null){

            $userid = $request->user()->id;
        }


        $useragent = ['userip'=>$request->ip(),
            'userid'=>$userid,
            'requesturl'=>$request->fullUrl(),
            'browser'=>$request->userAgent(),
            'requestbody'=>$request->getContent()];

        return $useragent;

    }
}
