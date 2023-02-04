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
        $woningdetails = $this->getPostcode($adresquery);

        // open Detail page
        // var_dump($woningdetails);

        return view('detailPage', compact('woningdetails'));
    }


    public function getPostcode($adresquery = NULL)
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
}
