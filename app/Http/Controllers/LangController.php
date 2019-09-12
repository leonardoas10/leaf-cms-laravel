<?php

namespace App\Http\Controllers;

use Session;

class LangController extends Controller
{
    public function lang($lang)
    {
        if($lang === 'lang-en') {
            Session::put('locale', 'en');
        } else {
            Session::put('locale', 'es');
        }
    }
}
