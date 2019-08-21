<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ForgotController extends Controller
{
    public function index() 
    {
        return view('client.forgot');
    }
    public function store() 
    {
        return redirect('reset');
    }
}
