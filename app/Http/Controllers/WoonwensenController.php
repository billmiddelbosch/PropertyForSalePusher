<?php

namespace App\Http\Controllers;

use Hamcrest\Type\IsString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WoonwensenController extends Controller
{

    public function loadJSON()
    {

        if (!Storage::disk('local')->get('woonwensen/sessions-nieuwbouw-monitor.json')) {
            echo "bestaat alweer niet";
        } else {
            $sessions = json_decode(Storage::disk('local')->get('woonwensen/sessions-nieuwbouw-monitor.json'), true);
        }

        // $exportLine = array();
        $exportFileName     = sprintf('test.csv', date('d-m-Y'));

        Storage::disk('local')->delete($exportFileName);


        foreach ($sessions['data'] as $session) {
            if ($session['pages'] <> NULL) {
                Storage::disk('local')->append($exportFileName, '');
                foreach ($session['pages'] as $page) {

                    // foreach ($page['responses'] as $antwoord) {
                    //     Storage::disk('local')->append($exportFileName, $antwoord['question']['title'] . ',', NULL);
                    // }

                    foreach ($page['responses'] as $antwoord) {
                        if (!is_string($antwoord['response'])) {
                            if (count($antwoord['response']) == 0) {
                                Storage::disk('local')->append($exportFileName, ',', NULL);
                            } else {
                                for ($i = 0; $i < count($antwoord['response']); $i++) {
                                    Storage::disk('local')->append($exportFileName, $antwoord['response'][$i], NULL);
                                    if ($i + 1 < count($antwoord['response'])) {
                                        Storage::disk('local')->append($exportFileName, ';', NULL);
                                    }
                                }
                                Storage::disk('local')->append($exportFileName, ',', NULL);
                            }
                        } else {
                            Storage::disk('local')->append($exportFileName, $antwoord['response'], NULL);
                            Storage::disk('local')->append($exportFileName, ',', NULL);
                        }
                    }
                }
            }
        }

        var_dump($exportFileName);
    }
}
