<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DeleteAjaxProductController extends Controller
{
    protected $admin = [];
    protected $product;

    public function __construct(){
        $this->product= new Product();
    }

    public function deletAjax($id){
        $this->product->delete($id);
        $this->admin['products']=$this->product->getAll();
        return $this->admin['products'];
    }
}
