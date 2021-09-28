<?php

namespace App\Http\Middleware;

use App\ImplementationService\UsersService\UsersService;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
           // dd($request->user());

        if (Auth::guard('api')->check()) {




            $params = array();

            $resourceurl = $request->getRequestUri();




            $userroleid = $request->user()->userroleid;


            $params['userroleid'] = $userroleid;

            $params['url'] = $resourceurl;


            //perform checks here
            $service = App::make(UsersService::class);

            $result = $service->checkuserrolepermission($params);


            if($result!="true"){

             //   dd($result);


                $message = ["message" =>$result];
                return response($message, 401);
            }






            return $next($request);
        } else {
            $message = ["message" => "Permission Denied"];
            return response($message, 401);
        }
    }

}
