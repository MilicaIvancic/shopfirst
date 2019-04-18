<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meni;
use App\Http\Requests\MenuRequest;
class AdminMenuProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $admin = [];
    protected $meni;

    public function __construct(){
        $this->meni= new Meni();
    }

    public function index()
    {
        $this->admin['menu']=$this->meni->getAll();

        return view('pages.admin.menu', $this->admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.insertmenu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {

        $this->meni->menuname = $request->input('name');
        $this->meni->href = $request->input('href');

        try{
            //dd($korisnik);
            $this->meni->insert();
            return redirect("/adminmenu")->with('message','You have successfully added the meni');
        }
        catch(\Exception $ex) {
            return redirect("/adminmenu")->with('error',$ex);
            \Log::error($ex->getMessage());
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
        $this->admin['menu']=$this->meni->shoe($id);
        //dd($this->admin['menu']);
        return view('pages.admin.updatemenu', $this->admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, $id)
    {
        $this->meni->menuname = $request->input('name');
        $this->meni->href = $request->input('href');

        try{
            //dd($korisnik);
            $this->meni->update($id);
            return redirect("/adminmenu")->with('message','You have successfully added the meni');
        }
        catch(\Exception $ex) {
            return redirect("/adminmenu")->with('error',$ex);
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
        $this->meni->delete($id);
        $this->admin['menu']=$this->meni->getAll();
        return $this->admin['menu'];
    }
}
