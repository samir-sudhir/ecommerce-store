<?php

//success

 function success($message,$statusCode,$data=null){

    return response()->json([
        'data'=>$data,
        'message'=>$message,
        
    ],$statusCode);
}

//error

function error($message,$statusCode){
    return response()->json([
        'message'=>$message,
        
    ],$statusCode);
}