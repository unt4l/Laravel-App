<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App;

class SearchresultsController extends Controller
{
    public function index(Request $request) {
    	return view('index');
    } 

    public function search(Request $request) {
     	$query = $request->get('query');

  //   	$headers = ['Accept' => 'application/json', 'X-IBM-Client-Id' => '8b0ccfb8-4dd0-4772-8923-00b1765c7325','X-IBM-Client-Secret' => 'H4lQ1xA1mW6cO0jS4kC5oM5jV2gA0nT6nE2wP4oB5tO6qQ6oS1'];

		// $client = new \GuzzleHttp\Client([
		//     'headers' => $headers
		// ]);

		$client = new Client(['base_uri' => 'https://citizen-living-api-dev.au-syd.mybluemix.net']);

		$res1 = $client->request('GET', '/api/News?filter={"where": {"title": {"regexp": "/'.$query.'/ig"}},"order":"created_at desc"}'.'&access_token='.$request.session()->get('id'));
		$res2 = $client->request('GET', '/api/Events?filter={"where": {"event_title": {"regexp": "/'.$query.'/ig"}},"order":"event_date desc"}'.'&access_token='.$request.session()->get('id'));
		$res3 = $client->request('GET', '/api/Places?filter={"where": {"place_name": {"regexp": "/'.$query.'/ig"}},"order":"created_at desc"}'.'&access_token='.$request.session()->get('id'));
		// $res4 = $client->request('GET', '/api/emergency_contacts?filter={"where": {"emergency_name": {"regexp": "/'.$query.'/ig"}}}');
		// $res5 = $client->request('GET', '/api/public_transports?filter={"where": {"transport_name": {"regexp": "/'.$query.'/ig"}}}');

		$x1 = json_decode($res1->getBody(), true);
		$x2 = json_decode($res2->getBody(), true);
		$x3 = json_decode($res3->getBody(), true);
		// $x4 = json_decode($res4->getBody(), true);
		// $x5 = json_decode($res5->getBody(), true);

		
		$result = array('x1' => $x1, 'x2' => $x2, 'x3' => $x3, 'x6' => $query,
			'x7' => count($x1) + count($x2) + count($x3));
		// $client->send(array(
		//     $client->get('http://www.example.com/foo'),
		//     $client->get('http://www.example.com/baz'),
		//     $client->get('http://www.example.com/bar'),
		//     $client->get('http://www.example.com/bar'),
		// ));
		return view('searchresults')->with('data',$result);
    	// return view('index')->with('x1',$x1);	
    	// return view('index')->with('x2',$x2);	
    	// return view('index')->with('x3',$x3);	
    	// return view('index')->with('x4',$x4);	

    } 

}
