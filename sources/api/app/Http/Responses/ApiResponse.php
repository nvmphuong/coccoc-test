<?php

namespace App\Http\Responses;
/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 14/10/2019
 * Time: 10:38 AM
 */
trait ApiResponse
{
    public function response($data)
    {
        return json_encode([
            'data' => $data,
            'status' => 1
        ]);
    }

    public function responseFail($message = null)
    {
        return json_encode([
            'status' => 2
            , 'message' => $message
        ]);
    }
}