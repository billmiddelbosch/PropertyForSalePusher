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

        for ($i = 1; $i > 0; $i--) {
            $xmlString = file_get_contents('https://www.jumba.nl/assets/sitemap/map-' . $i . '.xml');
            $xmlObject = simplexml_load_string($xmlString);

            $json = json_encode($xmlObject);
            $phpArray = json_decode($json, true);

            $woningen = $phpArray['url'];
            // for ($a = 0; $a < count($woningen); $a++) {
            for ($a = 0; $a < 10; $a++) {
                $datum = substr($woningen[$a]['lastmod'], 0, 10);

                if ($datum == substr(now()->toDateTimeString(), 0, 10)) {
                    $item = "";
                    $adres = substr($woningen[$a]['loc'], 17);

                    $adresarray = explode('/', $adres);

                    $plaats = str_replace('%27', '', str_replace('%20', ' ', $adresarray[0]));
                    $straat = str_replace('%27', '', str_replace('%20', ' ', $adresarray[1]));
                    $nummer = preg_replace('/[^0-9]/', '', $adresarray[2]);
                    $addition = preg_replace('/[^a-zA-Z]/', '', $adresarray[2]);

                    $adresquery = "$straat $nummer $addition";
                    $woningdetails = $this->getPostcode($adresquery);

                    if ($woningdetails != NULL) {
                        $status = $woningdetails[0]['Parameters']['Forsale'];
                        $postcode = $woningdetails[0]['Payload']['Main']['Postcode']['P6'];
                        $jumbaId = $woningdetails[0]['Payload']['ID'];

                        $item = woning::where('jumbaId', $jumbaId)->get();

                        if (!$item->isEmpty()) {
                            woning::where('jumbaId', $jumbaId)->update(
                                [
                                    'status' => $status,
                                ]
                            );
                        } else {
                            DB::table('woning')->insert(
                                [
                                    'plaats' => $plaats,
                                    'straat' => $straat,
                                    'nr' => $nummer,
                                    'addition' => $addition,
                                    'datum' => $datum,
                                    'status' => $status,
                                    'postcode' => $postcode,
                                    'jumbaId' => $jumbaId
                                ]
                            );
                        }
                    } else {
                        $status = false;
                        $postcode = "unknown";
                        $jumbaId = "unknown";
                    }

                }
            }
        }

        foreach (woning::all() as $house) {
            echo $house->straat . " " . $house->nr . " " . $house->jumbaId .  '</br>';
        }
        
        //return view('showXML', compact('woningen'));
    }

    public function getPostcode($adresquery)
    {
        $response = Http::withHeaders([
            'api-key' => 'xA1uNvEKgkmKGzN5HySnK5xeY8x3EFs3'
        ])->get('https://api.jumba.nl/v1/search?q=' . $adresquery);

        if ($response->successful() && $response['Items'] !== NULL) {
            return $response['Items'];
        } else {
            echo "helaas";
        }
        
    }

}
