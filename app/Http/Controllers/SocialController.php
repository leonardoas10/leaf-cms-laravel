<?php
namespace App\Http\Controllers;

use Socialite;
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CompleteRegisterRequest;

class SocialController extends Controller
{
    public function index()
    {
        return view('client.completeregister');
    }
 
    public function store(CompleteRegisterRequest $request)
    {
        $request->password = Hash::make($request->password);

        $user = User::where('provider_id', session()->get('get_info')->id)->first();

        if (!$user) {
            $user = User::create([
                'username' => session()->get('get_info')->name,
                'firstname' => session()->get('get_info')->user['first_name'],
                'lastname' => session()->get('get_info')->user['last_name'],
                'password' => $request->password,
                'email'    => session()->get('get_info')->email,
                'image'    => session()->get('get_info')->avatar,
                'provider' => session()->get('provider'),
                'provider_id' => session()->get('get_info')->id
            ]);
        }

        auth()->login($user);
        
        return redirect('admin/posts'); 
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->fields(['name', 'first_name', 'last_name', 'email'])->user();

        if($user = User::where('email', $getInfo->email)->first()) {
            return $this->authAndRedirect($user);
        } 

        Session::put('get_info', $getInfo);
        Session::put('provider', $provider);

        return redirect('/complete');
    }

    // Login y Redirección
    public function authAndRedirect($user)
    {
        auth()->login($user);
    
        return redirect('admin/profile/1');
    }

}