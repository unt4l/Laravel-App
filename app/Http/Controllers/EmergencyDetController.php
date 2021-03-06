<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App;

class EmergencyDetController extends Controller
{

    public function index(Request $request, $id) {

    	$client = new Client(['base_uri' =>'http://locus-api-dev.au-syd.mybluemix.net']);

    	$res1 = $client->request('GET', '/api/emergency_contacts/'.$id.'?access_token='.$request->session()->get('id'));
    	$res2 = $client->request('GET', '/api/emergency_contacts?access_token='.$request->session()->get('id'));

		$x1 = json_decode($res1->getBody(), true);
		$x2 = json_decode($res2->getBody(), true);

    	$result = array('x1' => $x1, 'x2' => $x2);

    	return view('emergencycontact-details')->with('data',$result);
    } 
}
