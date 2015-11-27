<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Response;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function responseAnswer($error, $data = NULL, $message = NULL, $code = NULL, $errors = NULL){
        $responseArray['_token'] = csrf_token();
        if($error){
            $responseArray['error'] = $error;
        }
        if($code){
            $responseArray['code'] = $code;
        }
        if($message){
            $responseArray['message'] = $message;
        }
        if($data){
            $responseArray['data'] = $data;
        }
        if($errors){
            $responseArray['errors'] = $this->parsErrors($errors->toArray());
        }

        return Response::json(
            $responseArray,
            200
        );
    }

    public function parsErrors($errors){
        foreach($errors as $field_errors){
            foreach($field_errors as $error){
                $error_arr[]['message'] = $error;
            }
        }
        return $error_arr;
    }
}
