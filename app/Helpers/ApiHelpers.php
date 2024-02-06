<?php

namespace App\Helpers;

class ApiHelpers
{
    protected static $response = [
        'code' => null,
        'message' => null,
        'data' => null
    ];

    public static function createApi($code=null, $message=null, $data=null)
    {
        self::$response['code'] = $code;
        self::$response['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['code']);
    }

//    Meta Tags
//    protected static $response = [
//        'meta' => [
//            'code' => null,
//            'message' => null,
//        ],
//        'data' => null
//    ];
//
//    public static function createApi($code=null, $message=null, $data=null)
//    {
//        self::$response['meta']['code'] = $code;
//        self::$response['meta']['message'] = $message;
//        self::$response['data'] = $data;
//
//        return response()->json(self::$response, self::$response['meta']['code']);
//    }
}
