<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomepageController extends Controller
{
    public function index()
    {
        return view('homepage');
    }

    public function searchDetails(Request $request)
    {
        return redirect()->route('woningdetails-finddetails', array('plaats' => $request->plaats, 'straat' => $request->straat, 'nr' => $request->nr));
    }

}