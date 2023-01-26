<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaklrController extends Controller
{
    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index()
    {
        //var_dump($this->database);
        return response()->json($this->database->getReference('/sessions')->getSnapshot());
    }
}
