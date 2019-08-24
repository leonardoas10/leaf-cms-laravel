<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.registration');
    }
  
    public function store()
    {
        User::create(request()->all());
             
        return redirect('admin'); 
    }

}
