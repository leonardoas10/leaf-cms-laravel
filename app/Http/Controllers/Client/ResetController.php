<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class ResetController extends Controller
{
    public function index() 
    {
        return view('client.reset');
    }
}
