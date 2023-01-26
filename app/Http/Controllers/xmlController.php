<?php

namespace App\Http\Controllers;

use App\Models\Woning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class xmlController extends Controller
{
    public function index()
    {
        $woningen = [];

        for ($i = 7; $i > 0; $i--) {
            $xmlString = file_get_contents('https://www.jumba.nl/assets/sitemap/map-' . $i . '.xml');
            $xmlObject = simplexml_load_string($xmlString);

            $json = json_encode($xmlObject);
            $phpArray = json_decode($json, true);

            $woningen = $phpArray['url'];
            for ($a = 0; $a < count($woningen); $a++) {
                $datum = substr($woningen[$a]['lastmod'], 0, 10);

                if ($datum == '2023-01-21') {
                    $adres = substr($woningen[$a]['loc'], 17);

                    $adresarray = explode('/', $adres);

                    $plaats = str_replace('%27', '\'', str_replace('%20', ' ', $adresarray[0]));
                    $straat = str_replace('%27', '\'', str_replace('%20', ' ', $adresarray[1]));
                    $nummer = preg_replace('/[^0-9]/', '', $adresarray[2]);
                    $addition = preg_replace('/[^a-zA-Z]/', '', $adresarray[2]);


                    // DB::table('woning')->insert(
                    //     [
                    //         'plaats' => $plaats,
                    //         'straat' => $straat,
                    //         'nr' => $nummer,
                    //         'addition' => $addition,
                    //         'datum' => $datum
                    //     ]
                    // );
                }
            }
        }
        $this->getPostcode($straat);

        return view('showXML', compact('woningen'));
    }

    public function getPostcode($straat)
    {

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'API_KEY' => 'xA1uNvEKgkmKGzN5HySnK5xeY8x3EFs3'
        ])->get('https://www.jumba.nl/v1/search', [
            'q' => 'Kwaadeindstraat 145 Tilburg',
        ]);

        var_dump($response);
    }


}
