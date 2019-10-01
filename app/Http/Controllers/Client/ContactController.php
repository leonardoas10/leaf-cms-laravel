<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('client.contact');
    }

    public function create()
    {
        //
    }

    public function store()
    {
        $email = request()->email;
        return back()->with('success', 'We have received your email' . ' ' . $email);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
