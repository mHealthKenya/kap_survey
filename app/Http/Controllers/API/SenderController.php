<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use App\Send_Log;
use App\Services\AfricasTalkingGateway;

class SenderController extends Controller
{

    public function sender($from, $recipients, $message)
    {

        $username = "mhealthkenya";
        $apikey = "9318d173cb9841f09c73bdd117b3c7ce3e6d1fd559d3ca5f547ff2608b6f3212";
        $gateway = new AfricasTalkingGateway($username, $apikey);

        $results = $gateway->sendMessage($recipients, $message, $from);

        foreach ($results as $result) {

            echo " Number: " . $result->number;
            echo " Status: " . $result->status;
            echo " StatusCode: " . $result->statusCode;
            echo " MessageId: " . $result->messageId;
            echo " Cost: " . $result->cost . "\n";
           
        }
        return $recipients;
    }

}
