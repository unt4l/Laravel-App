<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use App;
use Datetime;
use Session;

class PlaceOfInterestDetController extends Controller
{
    public function index(Request $request, $id) {
		$client = new Client(['base_uri' => 'http://locus-api-dev.au-syd.mybluemix.net']);
		$filter = urlencode('{"where":{"moduleId":"'.$id.'","accountId":"'.$request->session()->get('userid').'"}}');
		//$filter = encodeURIComponent('{"where":{"userId":"'.$request->session()->get('userId').'"}}');
    	$res1 = $client->request('GET', '/api/Places/'.$id.'?access_token='.$request->session()->get('id'));
    	$res2 = $client->request('GET', '/api/Places?filter[limit]=6&filter[order_by]=wkt desc'.'&access_token='.$request->session()->get('id'));
        $res3 = $client->request('GET', '/api/comments?filter[where][moduleId]='.$id.'&filter[order_by]=comment_date_posted asc'.'&access_token='.$request->session()->get('id'));
		$res4 = $client->request('GET', '/api/likes/count?where[moduleId]='.$id.'&access_token='.$request->session()->get('id'));
		$res5 = $client->request('GET','/api/likes?filter='.$filter.'&access_token='.$request->session()->get('id'));

		$x1 = json_decode($res1->getBody(), true);
		$x2 = json_decode($res2->getBody(), true);
        $x3 = json_decode($res3->getBody(), true);
		$x4 = json_decode($res4->getBody(), true);
		$x5 = json_decode($res5->getBody());

		$result = array('x1' => $x1, 'x2' => $x2, 'x3' => $x3, 'x4' => $x4, 'x5' => $x5 );
		
		//dd($x5);

    	return view('placeofinterest-details')->with('data',$result);
	}

    public function favs(Request $request){

		//$result = array('title' => $module, 'acc_id' => $Accid, 'token' => $token);

		try {
			$id =  $request->get('id');
			$module = $request->get('title');
			$token = $request->session()->get('id');
			//$result = array('title' => $module, 'acc_id' => $Accid, 'token' => $token, 'moduleId'=>$id);

			$client = new Client();

			$res = $client->request('post','http://locus-api-dev.au-syd.mybluemix.net/api/likes?access_token='.$token,
				[ 'form_params' => [
					'module_name' => $module,
					'moduleId' => $id
				]]);
			$result = json_decode($res->getbody(), true);

			return redirect()->back();
			
		} catch (RequestException $e) {
			$response = $this->StatusCodeHandling($e);
			return redirect()->back();
		}
	
	}
	
	public function unfavs(Request $request){
		try {
			$token = $request->session()->get('id');
			$likeId = $request->get('likeId');
			//$result = array('title' => $module, 'acc_id' => $Accid, 'token' => $token, 'moduleId'=>$id);

			$client = new Client();

			$res = $client->request('delete','http://locus-api-dev.au-syd.mybluemix.net/api/likes/'.$likeId.'?access_token='.$token);
			$result = json_decode($res->getbody(), true);

			return redirect()->back();
			
		} catch (RequestException $e) {
			$response = $this->StatusCodeHandling($e);
			return redirect()->back();
		}
	}

	public function checkLike(Request $request, $id){
		$client = new Client();
		$filter = urlencode('{"where":{"moduleId":"'.$id.'","accountId":"'.$request->session()->get('userid').'"}}');
		$res = $client->request('GET','http://locus-api-dev.au-syd.mybluemix.net/api/likes?filter='.$filter.'&access_token='.$request->session()->get('id'));

		$result = json_decode($res->getbody());
		//$a = array('userId'=>$request->session()->get('userid'), 'moduleId'=>$id, 'result'=>$result);
		dd($result);
		if($result != null){
			// $req = $client->request('delete','http://locus-api-dev.au-syd.mybluemix.net/api/likes/'.$result[0]->id.'?access_token='.$request->session()->get('id'));
			// $result2 = json_decode($req->getbody());
			// dd($result2);
		}else{
			// $module = $request->get('title');
			// $req2 = $client->request('post','http://locus-api-dev.au-syd.mybluemix.net/api/likes?access_token='.$token,
			// 	[ 'form_params' => [
			// 		'module_name' => $module,
			// 		'moduleId' => $id
			// 	]]);
			// 	$result3 = json_decode($req3->getBody());
			// 	dd($result3);
		}

	}

}
