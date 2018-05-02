<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App;

class EventCatController extends Controller
{
    public function index(Request $request) {

		$client = new Client(['base_uri' => 'http://locus-api-dev.au-syd.mybluemix.net']);
		
		$res = $client->request('GET', '/api/Events?filter[order_by]=event_date asc'.'&access_token='.$request->session()->get('id'));

        $x = json_decode($res->getBody(), true);

    	return view('event-category')->with('x',$x);	
    } 
}
