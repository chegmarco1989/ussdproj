<?php

namespace App\Http\Controllers;

use Sparors\Ussd\Facades\Ussd;
use App\Http\Ussd\Welcome;

class UssdController extends Controller
{
    public function index()
    {
		/* Our USSD Provider URL is something like: 
			http://ourgatewayserver.website?metaData=%m%&operatorNumber=%ut%&message=%g%&receiverNumber=%mm%&ussdSessionId=%ss%" */
		
		/*
			Our Provider uses 5 Parameters like:
				1 - metaData
				2 - operatorNumber	(have the same phone number value with receiverNumber) 
				3 - message
				4 - receiverNumber	(have the same phone number value with operatorNumber)
				5 - ussdSessionId
		*/

    	$ussd = Ussd::machine()->set([
			'metaData'  => request('metaData'),
		    'operatorNumber' => request('operatorNumber'),
		    'receiverNumber' => request('operatorNumber'),
		    'ussdSessionID' => request('ussdSessionID'),
		    'message' => request('message')
		])
	    ->setInitialState(Welcome::class)
	    ->setResponse(function(string $message, string $action) {
		    return [
				'USSDResp' => [
				    'action' => $action === 2 ? 'prompt' : 'input',
				    'menus' => '',
				    'title' => $message
				]
		    ];
		});

	    return response()->json($ussd->run());
    }
}