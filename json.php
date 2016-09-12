<?php

// function for returing successful response status
function succeed($message) {
    if (!$message) $message = "Success";
    
    $json = [
        "success" => true,
        "message" => $message,
    ];
    
    $jsonString = json_encode($json);
    die($jsonString);
}

// function for returning failed response status
function fail($message) {
    if (!$message) $message = "Server failed to perform that operation";
    
    $json = [
        "success" => false,
        "message" => $message,
    ];
    
    $jsonString = json_encode($json);
    die($jsonString);
}
