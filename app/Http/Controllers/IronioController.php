<?php

namespace Rest\Http\Controllers;

use Illuminate\Http\Request;
use IronMQ\IronMQ;

class IronioController extends Controller
{
    public function index(Request $request)
    {
        $message = $request['message'];

        $ironmq = new IronMQ(array(
            'token' => 'bhdcy7kDW74vw2Rd6ATp',
            'project_id' => '5ba3e47d7edc6b000bd52943'
        ));

        $ironmq->ssl_verifypeer = false;
        $queue_name = "Hackathon";

        $postMessage = $ironmq->postMessage($queue_name, $message);
        $postMessage = get_object_vars($postMessage);

        return $postMessage;
    }
}
