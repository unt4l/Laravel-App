<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App;

class EmergencyCatController extends Controller
{
    public function index(Request $request) {
  //   	$headers = ['Accept' => 'application/json', 'X-IBM-Client-Id' => '8b0ccfb8-4dd0-4772-8923-00b1765c7325','X-IBM-Client-Secret' => 'H4lQ1xA1mW6cO0jS4kC5oM5jV2gA0nT6nE2wP4oB5tO6qQ6oS1'];

		// $client = new \GuzzleHttp\Client([
		//     'headers' => $headers
		// ]);

		// $res = $client->request('GET', 'https://api.au.apiconnect.ibmcloud.com/fikar-opus/sb/api/emergency_contacts');
    	$client = new Client(['base_uri' =>'http://locus-api-dev.au-syd.mybluemix.net']);

    	$res = $client->request('GET', '/api/emergency_contacts?filter[order_by]=emergency_name ASC'.'&access_token='.$request->session()->get('id'));

        $x = json_decode($res->getBody(), true);

    	return view('emergencycontact-category')->with('x',$x);	
    } 
}
