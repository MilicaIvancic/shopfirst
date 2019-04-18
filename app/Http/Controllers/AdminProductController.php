<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use App\Http\Requests\ProductsRequest;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $admin = [];
    protected $product;

    public function __construct(){
        $this->product= new Product();
    }

    public function index()
    {
        $this->admin['products']=$this->product->getAll();
        return view('pages.admin.products', $this->admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $size=new Size();
        $category= new Category();
        $this->admin['size']=$size->getAll();
        $this->admin['category']=$category->getAllCategory();
        //dd($this->admin);
        return view('pages.admin.insertproduct', $this->admin);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {

        $this->product->sizearray=$request->input('size');
       $this->product->idCategory=$request->input('category');
       $this->product->description=$request->input('description');
       $this->product->price=$request->input('price');
       $this->product->nameProduct=$request->input('name');
        //$ldate = new DateTime('today');
        //$this->product->date=$ldate;
        //$this->product->datePrice=$ldate;

        // Rad sa fajlovima
        $file = $request->file('image');
        //dd($file);
        $filename = time().$file->getClientOriginalName();

        $this->product->pictureFile = $filename;

        if($file->isValid()){
            $file->move(public_path()."/images/", $filename);
            try{
               $this->product->addProduct();

                    return redirect()->back()->with('message','Proizvod je uspesno kreiran.');


            }
            catch(\Exception $ex) {
                return redirect()->back()->with('error','Problem pri unosu u bazu.');
                \Log::error($ex->getMessage());
            }
        } else {
            return redirect()->back()->with('error','Nesto nije u redu sa slikom.');
        }


       //dd($category);
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
        $this->admin['p']=$this->product->getProduct($id);
        //dd($this->admin);
        return view('pages.admin.updateProduct', $this->admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->product->description=$request->input('description');
        $this->product->nameProduct=$request->input('name');
        $file = $request->file('image');
        //dd($file);
        if($file){
            $filename = time().$file->getClientOriginalName();

            $this->product->pictureFile = $filename;


                $file->move(public_path()."/images/", $filename);
                try {

                    $this->product->updateProduct($id);
                    return redirect()->back()->with('message', 'Proizvod je uspesno kreiran.');


                }
                catch(\Exception $ex) {
                    return redirect()->back()->with('error','Problem pri unosu u bazu.');
                    //return "error baza";
                    \Log::error($ex->getMessage());
                }
             //else {
               // return redirect()->back()->with('error','Nesto nije u redu sa slikom.');

                //return "error slika";
            //}
        }
        else{
            $this->product->updateProductwithoutimg($id);
            return redirect()->back()->with('message','Proizvod je uspesno kreiran.');
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
       //
    }
}
