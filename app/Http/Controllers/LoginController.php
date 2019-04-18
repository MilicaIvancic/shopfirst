<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Useractivities;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class LoginController extends MyStartFrontController
{


    public function loginForm (){

       return view('pages.login', $this->data);
    }

    public function registerform (){

        return view('pages.registerForm', $this->data);
    }

    public function register(UserRequest $request){
        if($request->has('btnregister')){
            //dd($request);
            // Prosledjivanje podataka za unos -> kroz polja klase. Drugi nacin: kroz funkciju insert($naziv, $opis...)
            $korisnik = new User();
            $name=$korisnik->userName = $request->input('name');
           $korisnik->surname = $request->input('surname');
            $email=$korisnik->email = $request->input('email');
            $korisnik->password = $request->input('password');
            $korisnik->address = $request->input('adress');
            $korisnik->mobilePhone = $request->input('mobile');

                try{
                    //dd($korisnik);
                    $korisnik->Add();
                    $activity="this user is registered, now";
                    $activiti=new Useractivities();
                    $activiti->insert($email, $name, $activity);
                    return redirect("/")->with('message','Inserted');
                }
                catch(\Exception $ex) {
                    return redirect("/")->with('error',$ex);
                    \Log::error($ex->getMessage());
                }
            }

    }

    public function login(Request $request){
        //dd($request);
        if($request->has('login')){
            $email = $request->input('email');
            $password= $request->input('password');

            $korisnik = new User();
            $user = $korisnik->checkUser($email, $password);

            if($user){
                $request->session()->put('user', $user);
                $userinsert=$request->session()->get('user');
                $name=$userinsert->userName;
                $activity="this user is logied in";
                $activiti=new Useractivities();
                $activiti->insert($email, $name, $activity);

                return redirect("/")->with('message', 'You successfully logged in.');
            } else {
                return redirect("/")->with('error', 'You failed to log in.');
            }
        }
    }

    public function logout(Request $request){
        if($request->session()->has('user')){

            $userinsert=$request->session()->get('user');
            $name=$userinsert->userName;
            $email=$userinsert->email;
            $activity="this user is logied OUT ";
            $activiti=new Useractivities();
            $activiti->insert($email, $name, $activity);
            $request->session()->forget('user');

            return redirect("/")->with('message', 'You successfully logged out.');
        }
    }
}
