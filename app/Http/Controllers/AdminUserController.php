<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    protected $admin = [];
    protected $user;

    public function __construct() {

        $this->user = new User();
    }

    public function index()
    {
        $this->admin['users']=$this->user->getAll();
        return view('pages.admin.users', $this->admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.insertuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if($request->has('btnregister')){
            //dd($request);
            // Prosledjivanje podataka za unos -> kroz polja klase. Drugi nacin: kroz funkciju insert($naziv, $opis...)
            //$korisnik = new User();
            $this->user->userName = $request->input('name');
            $this->user->surname = $request->input('surname');
            $this->user->email = $request->input('email');
            $this->user->password = $request->input('password');
            $this->user->address = $request->input('adress');
            $this->user->mobilePhone = $request->input('mobile');


            try{
                //dd($korisnik);
                $this->user->Add();
                return redirect("/adminpanel")->with('message','You have successfully added the user');
            }
            catch(\Exception $ex) {
                return redirect("/adminpanel")->with('error',$ex);
                \Log::error($ex->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->admin['user']=$this->user->getUser($id);
        //dd($this->admin['user']);
        return view('pages.admin.updateUser', $this->admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {

            //dd($request);

            //$korisnik = new User();
        $this->user->userName = $request->input('name');
        $this->user->surname = $request->input('surname');
        $this->user->email = $request->input('email');
           $p= $this->user->password = $request->input('password');
        $this->user->active = $request->input('activ');
        $this->user->address = $request->input('adress');
        $this->user->mobilePhone = $request->input('mobile');
          $q=strlen($p);
          //dd($q);
            if($q<32){
                try{
                    //dd($korisnik);
                    $this->user->Updateuser($id);
                    return redirect("/adminuser")->with('message','You have successfully updated the user');
                }
                catch(\Exception $ex) {
                    return redirect("/adminuser")->with('error',$ex);
                    \Log::error($ex->getMessage());
                }
            }

            try{
                //dd($korisnik);
                $this->user->UpdateuserWithoutPassword($id);
                return redirect("/adminuser")->with('message','You have successfully updated the user');
            }
            catch(\Exception $ex) {
                return redirect("/adminuser")->with('error',$ex);
                \Log::error($ex->getMessage());
            }
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $x=$this->user->deleteUser($id);
        if($x){
            return redirect('/adminuser')->with('message', 'You have successfully deleted the user');
        }

       return redirect('/adminuser')->with('error', 'Error by deleting user.');
    }
}
