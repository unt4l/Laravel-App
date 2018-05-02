<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App;

class IndexController extends Controller
{

	public function profil(Request $request){
		return view('profil');
	}
  	public function index(Request $request) {

		//$client = new Client(['base_uri' => 'https://citizen-living-api-dev.au-syd.mybluemix.net']);
		$client = new Client(['base_uri' => 'http://locus-api-dev.au-syd.mybluemix.net']);

    	$res1 = $client->request('GET', '/api/News?filter[limit]=6&filter[order_by]=created_at desc'.'&access_token='.$request->session()->get('id'));
		$res2 = $client->request('GET', '/api/Events?filter[limit]=6&filter[order_by]=event_date desc'.'&access_token='.$request->session()->get('id'));
		$res3 = $client->request('GET', '/api/Places?filter[limit]=6&filter[order_by]=created_at desc'.'&access_token='.$request->session()->get('id'));
		$res4 = $client->request('GET', '/api/emergency_contacts?filter[limit]=6&filter[order_by]=emergency_name asc'.'&access_token='.$request->session()->get('id'));
		$res5 = $client->request('GET', '/api/public_transports?filter[limit]=6&filter[order_by]=created_at desc'.'&access_token='.$request->session()->get('id'));

		$x1 = json_decode($res1->getBody(), true);
		$x2 = json_decode($res2->getBody(), true);
		$x3 = json_decode($res3->getBody(), true);
		$x4 = json_decode($res4->getBody(), true);
		$x5 = json_decode($res5->getBody(), true);

		
		$result = array('x1' => $x1, 'x2' => $x2, 'x3' => $x3, 'x4' => $x4, 'x5' => $x5 );
		
		return view('index')->with('data',$result);

    } 

    public function register(Request $request) {
    	$phone = $request->get('no_hp');
    	$email = $request->get('email');
    	$username = $request->get('username');
		$password = $request->get('password');
		$full_name = $request->get('nama');
		$photo = 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png';
		$token ='SXUEnhmIrzsCTE3P90dguvBa8lop9AvrUzhDdavLvWLmPocpjBVva2SH49KINuaD';
		
		$client = new Client();
		//$headers = ['Content-Type' => 'application/json'];
		try {
			$res = $client->request('POST','http://locus-api-dev.au-syd.mybluemix.net/api/penggunas?access_token='.$token, 
			['form_params' => [
					'full_name' => $full_name,
					'phone' => $phone,
					'photo' => $photo,
					'username' => $username,
					'email' => $email,
					'password'=> $password
			]]);
			$result = json_decode($res->getbody());
			$request->session()->flash('status', 'Registration was Successfull!');
			//dd($result);
		 	return redirect('/login');
		} catch (RequestException $e) {
			$response = $this->StatusCodeHandling($e);
			$request->session()->flash('status', 'Failed To Register');
		}

	} 
	
	public function StatusCodeHandling($e)
		{
		if ($e->getResponse()->getStatusCode() == "400")
		{
		$this->prepare_access_token();
		}
		elseif ($e->getResponse()->getStatusCode() == "422")
		{
		$response = json_decode($e->getResponse()->getBody(true)->getContents());
		return $response;
		}
		elseif ($e->getResponse()->getStatusCode() == "500")
		{
		$response = json_decode($e->getResponse()->getBody(true)->getContents());
		return $response;
		}
		elseif ($e->getResponse()->getStatusCode() == "401")
		{
		$response = json_decode($e->getResponse()->getBody(true)->getContents());
		return $response;
		}
		elseif ($e->getResponse()->getStatusCode() == "403")
		{
		$response = json_decode($e->getResponse()->getBody(true)->getContents());
		return $response;
		}
		else
		{
		$response = json_decode($e->getResponse()->getBody(true)->getContents());
		return $response;
		}
		}

}
