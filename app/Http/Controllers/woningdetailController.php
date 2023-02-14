<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class woningdetailController extends Controller
{
    public function findDetails($plaats = NULL, $straat = NULL, $nr = NULL, $toev = NULL)
    {

        // set query string from url
        $adresquery = $straat . " " . $nr . " " . $toev . " " .  $plaats;

        // query woningdetails at Jumba API
        $jumbaDetails = $this->getJumbadata($adresquery);

        $altumDetails = $this->getAltumdata(strtoupper($jumbaDetails['Filter']['Postcode']), $jumbaDetails['Filter']['Number']);

        // open Detail page

        return view('detailPage', compact('jumbaDetails', 'altumDetails'));
    }


    public function getJumbadata($adresquery = NULL)
    {
        $response = Http::withHeaders([
            'api-key' => 'xA1uNvEKgkmKGzN5HySnK5xeY8x3EFs3'
        ])->get('https://api.jumba.nl/v1/search?q=' . $adresquery);

        if ($response->successful() && $response['Items'] !== NULL) {
            return $response['Items'][0];
        } else {
            echo "helaas";
        }
    }

    public function getAltumdata($postcode = NULL, $nummer = NULL)
    {

        $response = Http::withHeaders([
            'x-api-key' => 'm2ipzWVV3e9yPU9TduqpY4oZTbcEHCGj31GLVLYB',
            'Content-Type' => 'application/json'
        ])->post('https://api.altum.ai/sandbox/avm', [
            'postcode' => $postcode,
            'housenumber' =>  $nummer
        ]);

        if ($response->successful()) {
            return $response;
        } else {
            echo "helaas";
        }
    }
}
