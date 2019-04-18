<?php
/**
 * Created by PhpStorm.
 * User: Milica
 * Date: 2/28/2019
 * Time: 12:56 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product
{

    private $table = 'products';

    public $price;

    public $sizearray;
    public $id;
    public $idCategory;
    public $datePrice;
    public $nameProduct;
    public $pictureFile;
    public $description;
    public $date;




    public function get5(){
        return

            \DB::table('products')
            -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
            ->orderBy('datePrice', "desc", 'products.idProduct')
                ->where('a.active', '=', 1)
            ->limit(5)
            ->get();

    }

    public function updateProduct($id){

        \DB::table('products')
            ->where('idProduct', '=', $id)
            ->update([
                'nameProduct' =>$this->nameProduct,
                'image' => $this->pictureFile,
                'alt' => $this->nameProduct,
                'description'=> $this->description

                //'date' => $this->date
            ]);
    }

    public function updateProductwithoutimg($id){

        \DB::table('products')
            ->where('idProduct', '=', $id)
            ->update([
                'nameProduct' =>$this->nameProduct,
                'description'=> $this->description

                //'date' => $this->date
            ]);
    }

    public function getProduct($id){
        return \DB::table($this->table)
            ->where('idProduct', '=' , $id)
            ->first();
    }

    public function delete($id){
        return

            \DB::table('products')
                ->where('idProduct', '=', $id)->delete();

    }

public function addProduct(){



    \DB::transaction(function(){

        $this->id=\DB::table('products')
            ->insertGetId([
                'idCategory'=> $this->idCategory,
                'nameProduct' =>$this->nameProduct,
                'image' => $this->pictureFile,
                'alt' => $this->nameProduct,
                'description'=> $this->description,

                //'date' => $this->date
            ], 'idProduct');

        foreach($this->sizearray as $s){
            \DB::table('productsize')
                ->insert([
                    'idProduct'=> $this->id,
                    'idSize'=> $s
                ]);
        }
        \DB::table('price_article')
            ->insert([
                    //"datePrice" => $this->datePrice,

                    "idProduct" => $this->id,
                    "articlePrice" =>$this->price
            ]);
    });


}



    public function getAll()
    {

        $rezultat =
            \DB::table($this->table)

                -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                -> join ('category', 'products.idCategory', '=', 'category.idCategory')
                ->orderBy('datePrice', "desc", 'products.idProduct')
                ->where('a.active', '=', 1)
                ->paginate(6);


        return $rezultat;
    }
    // GET PROODUCTS BY CATEGORY


    ///ova kategorija mi je mnogo problematicna!!!!!
    public function getClothesProducts()
    {

        $rezultat =
            \DB::table('category AS k')
                ->join ('category AS c', 'k.idCategory', '=', 'c.subcategory')
                -> join ('products', 'c.idCategory', '=', 'products.idCategory')
                -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                ->orderBy('datePrice', "desc", 'products.idProduct')
                ->where('a.active', '=', 1)
                ->paginate(6);
        return $rezultat;
    }

    public function getByCategory($id)
    {
        //$category=
            //\DB::table('category')
           // ->where('idCategory', '=', $id)
             //->whereNull('subcategory')
                //->get();

        //if(!empty($category)){

        //if($id!=1){
        $rezultat =
            \DB::table($this->table)
                ->orderBy('date', 'desc')
                -> join ('category', 'products.idCategory', '=', 'category.idCategory')
                -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                    ->where([['products.idCategory', '=', $id],
                             ['a.active', '=', 1]
                        ])
                ->orderBy('datePrice', "desc", 'products.idProduct')
                ->paginate(6);
        return $rezultat;//}

        //if($id==1){
            //$rezultat =
                //\DB::table('category AS k')
                   // ->join ('category AS c', 'k.idCategory', '=', 'c.subcategory')
                    //-> join ('products', 'c.idCategory', '=', 'products.idCategory')
                    //-> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                    //->where('products.idCategory', '=', $id)
                    //->orderBy('datePrice', "desc", 'products.idProduct')
                   // ->paginate(6);
            //return $rezultat;
        //}
    }
    //END GET PRODUCTS BY CATEGORY
    // Category with number of products
    public function getPrimaryCategorySubcategory()
    {

        $rezultat =

            \DB::table('category AS k')
                ->select('k.name', 'k.idCategory' , \DB::raw('count(products.idProduct) as product_count'))
            ->join ('category AS c', 'k.idCategory', '=', 'c.subcategory')
                -> join ('products', 'c.idCategory', '=', 'products.idCategory')
                ->groupBy('k.name' , 'k.idCategory')
            ->get();
        return $rezultat;
    }

    public function getPrimaryCategory()
    {

        $rezultat =
            \DB::table($this->table)
        ->select('k.name', 'k.idCategory' , \DB::raw('count(products.idProduct) as product_count'))
        -> join ('category AS k', 'products.idCategory', '=', 'k.idCategory')
        ->whereNull('k.subcategory')
        ->groupBy('k.name' , 'k.idCategory')
        ->get();
        return $rezultat;
    }

    public function getSubCategory()
    {

        $rezultat =
            \DB::table($this->table)
                ->select('k.name'  , 'k.idCategory' , \DB::raw('count(products.idProduct) as product_count'))
                -> join ('category AS k', 'products.idCategory', '=', 'k.idCategory')
                ->whereNotNull('k.subcategory')
                ->groupBy('k.name' , 'k.idCategory')
                ->get();
        return $rezultat;
    }
//  END Category with number of products

//count of all products
 public function productCount(){

     return \DB::table($this->table)->count();
 }


 ///sort

    public function SortNameAZ($id){

        $rezultat =
            \DB::table($this->table)
                -> join ('category', 'products.idCategory', '=', 'category.idCategory')
                -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                ->where([
                    ['products.idCategory', '=', $id],
                    ['a.active', '=', 1]
                ])
                ->orderBy('products.nameProduct' , 'asc')
                ->paginate(6);
        return $rezultat;
    }

    public function SortNameAZAll(){

        $rezultat =
            \DB::table($this->table)
                -> join ('category', 'products.idCategory', '=', 'category.idCategory')
                -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                ->orderBy('products.nameProduct' , 'asc')
                ->where('a.active', '=', 1)
                ->paginate(6);
        return $rezultat;
    }

    public function SortNameZA($id){

        $rezultat =
            \DB::table($this->table)
                -> join ('category', 'products.idCategory', '=', 'category.idCategory')
                -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                ->where([
                    ['products.idCategory', '=', $id],
                    ['a.active', '=', 1]
                ])
                ->orderBy('products.nameProduct' , 'desc')
                ->paginate(6);
        return $rezultat;
    }

    public function SortNameZAAll(){

        $rezultat =
            \DB::table($this->table)
                -> join ('category', 'products.idCategory', '=', 'category.idCategory')
                -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                ->orderBy('products.nameProduct' , 'desc')
                ->where('a.active', '=', 1)
                ->paginate(6);
        return $rezultat;
    }

    public function SortPriceLow($id){

        $rezultat =
            \DB::table($this->table)
                -> join ('category', 'products.idCategory', '=', 'category.idCategory')
                -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                ->where([
                    ['products.idCategory', '=', $id],
                    ['a.active', '=', 1]
                ])
                ->orderBy('a.articlePrice' , 'asc')
                ->paginate(6);
        return $rezultat;
    }

    public function SortPriceLowAll(){

        $rezultat =
            \DB::table($this->table)
                -> join ('category', 'products.idCategory', '=', 'category.idCategory')
                -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                ->orderBy('a.articlePrice' , 'asc')
                ->where('a.active', '=', 1)
                ->paginate(6);
        return $rezultat;
    }

    public function SortPriceHight($id){

        $rezultat =
            \DB::table($this->table)
                -> join ('category', 'products.idCategory', '=', 'category.idCategory')
                -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                ->where([
                    ['products.idCategory', '=', $id],
                    ['a.active', '=', 1]
                ])
                ->orderBy('a.articlePrice' , 'desc')
                ->paginate(6);
        return $rezultat;
    }

    public function SortPriceHightAll(){

        $rezultat =
            \DB::table($this->table)
                -> join ('category', 'products.idCategory', '=', 'category.idCategory')
                -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
                ->orderBy('a.articlePrice' , 'desc')
                ->where('a.active', '=', 1)
                ->paginate(6);
        return $rezultat;
    }


    public function singleProduct($id){

        return
        \DB::table($this->table)
            -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
            //-> join ('category', 'products.idCategory', '=', 'category.idCategory')
            ->where("products.idProduct", '=', $id)
            ->orderBy('a.datePrice' , 'desc')
            ->first();

    }

    public function size($id){



        return
            \DB::table('productsize')
                -> join("size" , "size.idSize" , "=", "productsize.idSize")
                ->where("productsize.idProduct", '=', $id)
                ->orderBy('size.nameSize' , 'asc')
                ->get();


    }
    //funkcije koje ne rade
    //public function getininaeloquent5(){

    //return  \DB::table('products')
    //-> select('products.nameProduct',  "pa.price" )
    //-> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
    // -> join("price AS pa" , "pa.idPrice" , "=", "a.idPrice")
    // ->orderBy('datePrice', "desc")
    // ->groupBy('products.nameProduct', "pa.price" )
    // ->limit(5)
    //->get();


    //}
    //public function probna(){

    //return  \DB::table('products')
    //->select('products.idProduct',"products.nameProduct", "products.image", "products.alt", "a.articlePrice")
    // -> join("price_article AS a" , "a.idProduct" , "=", "products.idProduct")
    // ->whereIn('a.idPriceArticle',function ($query) {
    // $query->select('idPriceArticle'  )
    //->from('price_article')
    // ->orderBy('datePrice', "desc")
    //->distinct('idProduct');

    //->havingRaw('MAX(price_article.datePrice)')
    //->orderBy(\DB::raw('MAX(price_article.datePrice)') , 'desc');

    // })
    //\DB::raw('MAX(price_article.datePrice) as datePrice')
    //->orderBy('date', "desc")
    // ->limit(5)
    // ->get();
    // }
    // public function get56()
    //{

    //$last=\DB::table('price_article')
    // ->select('IdProduct',  \DB::raw('MAX(price_article.datePrice)'))
    // ->groupBy( 'IdProduct' );

    //$latestPriceArticle = \DB::table('price_article')
    // ->select('IdProduct', 'articlePrice', \DB::raw('MAX(price_article.datePrice) as datePrice'))
    //->groupBy( 'IdProduct', 'articlePrice');


    //$array['last']=$latestPriceArticle;

    // $products = \DB::table($this->table)
    //  ->joinSub($latestPriceArticle, 'a', function ($join) {
    //    $join->on("products.IdProduct", '=', "a.IdProduct");
    // })

    // ->orderBy('products.date', "desc", 'datePrice', 'desc')
    // ->limit(5)
    // ->distinct("a.IdProduct")
    //->get();

    //$rezultat =
    // \DB::table($this->table)
    // ->select('products.idProduct',"products.nameProduct", "products.image", "products.alt", "price_article.articlePrice","products.date")
    // -> join("price_article" , "price_article.IdProduct" , "=", "products.IdProduct")
    // ->groupBy('products.idProduct',"products.nameProduct", "products.image", "products.alt", "price_article.articlePrice","products.date")
    //->havingRaw('max(price_article.datePrice)')
    //->max("price_article.datePrice")
    //->groupBy('products.idProduct',"products.nameProduct", "products.image", "products.alt", "price_article.articlePrice")
    //->first("price_article.datePrice")
    //->distinct("products.idProduct")
    //  ->whereIn("products.IdProduct" ,$latestPriceArticle )
    //  ->orderBy('products.date', 'desc')
    //  ->limit(5)
    //  ->get();
    //->max("price_article.datePrice");

    // return $products;
    // }
}