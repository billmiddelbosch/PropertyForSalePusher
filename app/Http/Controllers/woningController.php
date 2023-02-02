<?php

namespace App\Http\Controllers;

use App\Models\Woning;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class woningController extends Controller
{
    public function viewAll()
    {
        $woningen = Woning::all();
        return view('woningView', compact('woningen'));
    }

    public function countperPlaats($plaats)
    {

        $summaryArray = [];

        $aantal = woning::where('plaats', $plaats)->count('id');

        $summaryArray = Arr::add(['aantal' => $aantal], 'gemiddelde', 100);

        return $summaryArray;
    }

}
