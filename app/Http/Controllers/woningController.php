<?php

namespace App\Http\Controllers;

use App\Models\Woning;

class woningController extends Controller
{
    public function viewAll()
    {
        $woningen = Woning::all();
        return view('woningView', compact('woningen'));
    }
}
