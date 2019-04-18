<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SortController extends MyStartFrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //private $data = [];


    public function sortNameAZ($id=null)
    {

        $product = new Product();
        if($id){
            $this->data['product'] = $product->SortNameAZ($id);
//dd($this->data['product']);
            $this->data['primaryCategorySub']=$product->getPrimaryCategorySubcategory();
            $this->data['prcategory']=$product->getPrimaryCategory();
            $this->data['subcategory']=$product->getSubCategory();
            $this->data['count'] = $product->productCount();
//dd($this->data['count']);
            return view('pages.products', $this->data);
        }
        else{
            $this->data['product'] = $product->SortNameAZAll();
//dd($this->data['product']);
            $this->data['primaryCategorySub']=$product->getPrimaryCategorySubcategory();
            $this->data['prcategory']=$product->getPrimaryCategory();
            $this->data['subcategory']=$product->getSubCategory();
            $this->data['count'] = $product->productCount();
//dd($this->data['count']);
            return view('pages.products', $this->data);
        }


    }


    public function sortNameZA($id=null)
    {
        $product = new Product();
        if($id){
            $this->data['product'] = $product->SortNameZA($id);
//dd($this->data['product']);
            $this->data['primaryCategorySub']=$product->getPrimaryCategorySubcategory();
            $this->data['prcategory']=$product->getPrimaryCategory();
            $this->data['subcategory']=$product->getSubCategory();
            $this->data['count'] = $product->productCount();
//dd($this->data['count']);
            return view('pages.products', $this->data);
        }
        else{
            $this->data['product'] = $product->SortNameZAAll();
//dd($this->data['product']);
            $this->data['primaryCategorySub']=$product->getPrimaryCategorySubcategory();
            $this->data['prcategory']=$product->getPrimaryCategory();
            $this->data['subcategory']=$product->getSubCategory();
            $this->data['count'] = $product->productCount();
//dd($this->data['count']);
            return view('pages.products', $this->data);
        }
    }

    public function SortPriceLow($id=null)
    {
        $product = new Product();
        if($id){
            $this->data['product'] = $product->SortPriceLow($id);

            $this->data['primaryCategorySub']=$product->getPrimaryCategorySubcategory();
            $this->data['prcategory']=$product->getPrimaryCategory();
            $this->data['subcategory']=$product->getSubCategory();
            $this->data['count'] = $product->productCount();

            return view('pages.products', $this->data);
        }
        else{
            $this->data['product'] = $product->SortPriceLowAll();

            $this->data['primaryCategorySub']=$product->getPrimaryCategorySubcategory();
            $this->data['prcategory']=$product->getPrimaryCategory();
            $this->data['subcategory']=$product->getSubCategory();
            $this->data['count'] = $product->productCount();

            return view('pages.products', $this->data);
    }
    }

    public function SortPriceHight($id=null)
    {
        $product = new Product();
        if($id){
            $this->data['product'] = $product->SortPriceHight($id);

            $this->data['primaryCategorySub']=$product->getPrimaryCategorySubcategory();
            $this->data['prcategory']=$product->getPrimaryCategory();
            $this->data['subcategory']=$product->getSubCategory();
            $this->data['count'] = $product->productCount();

            return view('pages.products', $this->data);
        }
        else{
            $this->data['product'] = $product->SortPriceHightAll();

            $this->data['primaryCategorySub']=$product->getPrimaryCategorySubcategory();
            $this->data['prcategory']=$product->getPrimaryCategory();
            $this->data['subcategory']=$product->getSubCategory();
            $this->data['count'] = $product->productCount();

            return view('pages.products', $this->data);
        }
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
