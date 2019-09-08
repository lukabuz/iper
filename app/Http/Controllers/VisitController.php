<?php

namespace App\Http\Controllers;

use App\Visit;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class VisitController extends Controller
{
    //
    public function visit(Request $request){
        $ip = $request->header('x-forwarded-for');
    	$ip = explode(",",$ip);
        $ip = $ip[0];

        $userAgent = $request->header('User-Agent');
        $agent = new Agent();
        $agent->setUserAgent($userAgent);

        $location = $this->get_geolocation(env('GEO_LOCATOR_API'), $ip);
        $decodedLocation = json_decode($location, true);

        die($decodedLocation);

        $visit = new Visit;
        $visit['ip'] = $ip;
        $visit['user-agent'] = $userAgent;
        $visit['device'] = $agent->device();
        $visit['os'] = $agent->platform();
        $visit['browser'] = $agent->browser();
        $visit['location'] = $decodedLocation->city . ', ' . $decodedLocation->country_name . ', ' . $decodedLocation->zipcode;
        $visit->save();

        abort(500);
    }

    public function dashboard(Request $request){
        $visits = Visit::all();

        return view('dashboard')->with('visits', $visits);
    }

    function get_geolocation($apiKey, $ip, $lang = "en", $fields = "*", $excludes = "") {
        $url = "https://api.ipgeolocation.io/ipgeo?apiKey=".$apiKey."&ip=".$ip."&lang=".$lang."&fields=".$fields."&excludes=".$excludes;
        $cURL = curl_init();

        curl_setopt($cURL, CURLOPT_URL, $url);
        curl_setopt($cURL, CURLOPT_HTTPGET, true);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        return curl_exec($cURL);
    }
}
