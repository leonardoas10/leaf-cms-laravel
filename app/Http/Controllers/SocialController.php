<?php
namespace App\Http\Controllers;

use Socialite;
use Session;
use App\User;
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
            if(session()->get('provider') === 'Google') { 
                $user = User::create([
                    'username' => session()->get('get_info')->name,
                    'firstname' => session()->get('get_info')->user['given_name'],
                    'lastname' => session()->get('get_info')->user['family_name'],
                    'password' => $request->password,
                    'email'    => session()->get('get_info')->email,
                    'image'    => session()->get('get_info')->avatar,
                    'provider' => session()->get('provider'),
                    'provider_id' => session()->get('get_info')->id
                ]);
            } elseif(session()->get('provider') === 'Linkedin') {
                $user = User::create([
                    'username' => session()->get('get_info')->name,
                    'firstname' => session()->get('get_info')->first_name,
                    'lastname' => session()->get('get_info')->last_name,
                    'password' => $request->password,
                    'email'    => session()->get('get_info')->email,
                    'image'    => session()->get('get_info')->avatar,
                    'provider' => session()->get('provider'),
                    'provider_id' => session()->get('get_info')->id
                ]);
            }
            else {
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
        }
        auth()->login($user);

        return redirect('admin/profile/1');    
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        if($provider === 'Facebook') {
            $getInfo = Socialite::driver($provider)->fields(['name', 'first_name', 'last_name', 'email'])->user(); //obtain firstname and lastname
        } else {
            $getInfo = Socialite::driver($provider)->user();
        }

        if($user = User::where('email', $getInfo->email)->first()) {
            if($user->provider !== $provider) {
                return redirect('/register')->with('danger', $getInfo->email . " is already registered on " . $user->provider);
            }
            return $this->authAndRedirect($user);
        } 

        Session::put('get_info', $getInfo);
        Session::put('provider', $provider);

        return redirect('/complete');
    }

    // Login and Redirect
    public function authAndRedirect($user)
    {
        auth()->login($user);
    
        return redirect('admin/profile/1');
    }
}