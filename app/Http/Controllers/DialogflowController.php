<?php

namespace Rest\Http\Controllers;

use Illuminate\Http\Request;
use DialogFlow\Client;

class DialogflowController extends Controller
{
    public function index(Request $request)
    {
        $_request = $request['_request'];

        try {
            $client = new Client('c942f36405c6471eaab980de8912602a');

            $query = $client->get('query', [
                'query' => $_request,
                'sessionId' => time()
            ]);

            $response = json_decode((string) $query->getBody(), true);

            return $response;
        } catch (\Exception $error) {
            echo $error->getMessage();
        }
    }
}
