<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Foo\DataProviderIssue2833\SecondTest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Card;
use App\Models\Useractivities;
use App\Http\Requests\CardRequest;
use App\Http\Requests\UserUpdateRequest;
use Psy\Util\Json;


class FrontEndContoller extends MyStartFrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//public $userid;


    public function streetStore()
    {

        $product = new Product();
        $category=new Category();

        $this->data['product'] = $product->get5();
        $this->data['collection'] = $category->getAll();

        //dd( $this->data['product']);
        return view('pages.streetStore', $this->data);
    }


    public function card(Request $request)
    {
              if($request->session()->has('user')){
                  $user = $request->session()->get('user');
                  $id=$user->idUser;
                  $card=new Card();
                  $this->data['exist']=$card->existCard($id);
                  $this->data['user']=$user;
                  if($this->data['exist']){

                      $card2=$card->getUsrCard($id);
                      $cardId=$card2->idCard;
                     $this->data['productsexist']=$card->cardProductEgzist($cardId);
                      $this->data['products']=$card->cardProduct($cardId);
                      $this->data['totalPrice']=$card->totalPrice($cardId);
                      return view('pages.card', $this->data);
                 }

        return view('pages.card', $this->data);

              }

              else{

                  return redirect('/')->with('error', 'If you wanna shop on our site, crete account or login on your account');
              }

    }

    public function userCardFinished(Request $request)
    {
        if($request->session()->has('user')){
            $user = $request->session()->get('user');
            $id=$user->idUser;
            $card=new Card();
            $this->data['exist']=$card->existOrderUser($id);

             //dd($this->data['exist']);
            if($this->data['exist']){
                //$card2=$card->getUsrCard($id);
                //$cardId=$card2->idCard;
                //$this->data['productsexist']=$card->cardProductEgzist($cardId);
                //$this->data['products']=$card->cardProduct($cardId);
                //$this->data['totalPrice']=$card->totalPrice($cardId);
                $this->data['productsUser']=$card->userOrders($id);
                $this->data['id']=$id;
                //dd($this->data['id']);
                $this->data['totalPriceUserEndCard']=$card->totalPriceFinishCard($id);
                return view('pages.usercard', $this->data);
            }

            //dd( $this->data['exist']);
            //return redirect('/card')->with('error', 'You never by somthing, go to shop and by best product');
            return view('pages.usercard', $this->data);

        }

        else{

            return redirect('/card')->with('error', 'You need do login to acess this page');
        }

    }

public function addToCard(CardRequest $request,$id ){

    if($request->has('btnadTocard')){
        //dd($request);
         //Prosledjivanje podataka za unos -> kroz polja klase. Drugi nacin: kroz funkciju insert($naziv, $opis...)

        $item = new Card();
        $item2 = new Card();
        $user = $request->session()->get('user');
        $idUser=$user->idUser;

        $p=$item->existCard($idUser);
        //dd($p);
        if($p){
            $size = $request->input('size');
            $sum = $request->input('sum');

            $card=$p->idCard;
 //dd($card);
           // $card=$item->idCard($idU );

            try{
                //dd($korisnik);
                $item2->addItemTocard($id, $card, $sum, $size);
                $userinsert=$request->session()->get('user');
                $name=$userinsert->userName;
                $email=$userinsert->email;
                $activity="this user add item to card";
                $activiti=new Useractivities();
                $activiti->insert($email, $name, $activity);
                return redirect("/card")->with('message','Inserted');
            }
            catch(\Exception $ex) {
                //dd($ex);
                return redirect("/card")->with('error','Fail insert');
                \Log::error($ex->getMessage());
            }
        }

        else{
            return redirect('/card')->with('error', 'You need create card');
        }
    }

}


    public function finishCard(Request $request, $id){


        $item = new Card();
        $item->finisShop( $id);
        $userinsert=$request->session()->get('user');
        $name=$userinsert->userName;
        $email=$userinsert->email;
        $activity="this user finish his cart";
        $activiti=new Useractivities();
        $activiti->insert($email, $name, $activity);

        return view('pages.congratulation', $this->data);
        //return 1;
    }
    public function updateCardItem(Request $request, $id){

            //dd($request);
            // Prosledjivanje podataka za unos -> kroz polja klase. Drugi nacin: kroz funkciju insert($naziv, $opis...)
            $item = new Card();
            $item->updateItemcard( $id);

        $userinsert=$request->session()->get('user');
        $name=$userinsert->userName;
        $email=$userinsert->email;
        $activity="this user update item to card";
        $activiti=new Useractivities();
        $activiti->insert($email, $name, $activity);
            //return Json($newsum);



    }

    public function loverSum($id){


        $item = new Card();
        $item->loverSum( $id);
    }
    public function delete($id ){

        //dd($request);
        // Prosledjivanje podataka za unos -> kroz polja klase. Drugi nacin: kroz funkciju insert($naziv, $opis...)
        $item = new Card();
        $item->delete($id);
        //dd($a);




    }

    public function createCard(Request $request)
    {
        if($request->session()->has('user')){
            $user = $request->session()->get('user');


            $id=$user->idUser;
            $card=new Card();
            $card->createCard($id);
            $userinsert=$request->session()->get('user');
            $name=$userinsert->userName;
            $email=$userinsert->email;
            $activity="this user create card";
            $activiti=new Useractivities();
            $activiti->insert($email, $name, $activity);

            return redirect("/card")->with("message" , "You are successfuly create card");
        }

        else{

            return redirect('/')->with('error', 'If you wanna shop on our site, crete account or login on your account');
        }

    }

    public function shopAll(Request $request)
    {
        $request->session()->forget('category');
        $request->session()->push("category", 'all');

//dd(session('category'));
        $product = new Product();
        $this->data['product'] = $product->getAll();
        //dd($this->data['product']);

        $this->data['primaryCategorySub']=$product->getPrimaryCategorySubcategory();
        $this->data['prcategory']=$product->getPrimaryCategory();
        $this->data['subcategory']=$product->getSubCategory();
        $this->data['count'] = $product->productCount();
//dd($prc);
        return view('pages.products', $this->data);

       // return view('pages.products');
    }

    public function shopClothes(Request $request)
    {
        $request->session()->forget('category');
        $request->session()->push("category", "l");

        $product = new Product();
        $this->data['product'] = $product->getClothesProducts();

        $this->data['primaryCategorySub']=$product->getPrimaryCategorySubcategory();
        $this->data['prcategory']=$product->getPrimaryCategory();
        $this->data['subcategory']=$product->getSubCategory();
        $this->data['count'] = $product->productCount();
//dd($prc);
        return view('pages.products', $this->data);
    }


    public function shopByCategory(Request $request,$id)
    {
        $request->session()->forget('category');
        $request->session()->push("category", $id);

       // dd(session('category'));
           $product = new Product();
           $this->data['product'] = $product->getByCategory($id);
//dd($this->data['product']);
           $this->data['primaryCategorySub']=$product->getPrimaryCategorySubcategory();
           $this->data['prcategory']=$product->getPrimaryCategory();
           $this->data['subcategory']=$product->getSubCategory();
           $this->data['count'] = $product->productCount();
//dd($this->data['count']);
           return view('pages.products', $this->data);

    }

    public function singleProduct($id)
    {
        $product = new Product();
        $this->data['product'] = $product->singleProduct($id);
        $this->data['size'] = $product->size($id);
        //dd($this->data['size']);
        return view("pages.singleProduct", $this->data);
    }




    public function contact()
    {
        return view('pages.contact', $this->data);
    }

    public function updatemyaccount(UserUpdateRequest $request, $id)
    {
        $korisnik = new User();
        $korisnik->userName = $request->input('name');
        $korisnik->surname = $request->input('surname');
        $korisnik->email = $request->input('email');
        $p= $korisnik->password = $request->input('password');
        $korisnik->active = $request->input('activ');
        $korisnik->address = $request->input('adress');
        $korisnik->mobilePhone = $request->input('mobile');
        $q=strlen($p);
        //dd($q);
        if($q<32){
            try{
                //dd($korisnik);
                $korisnik->Updateuser($id);
               // dd('a');
                return redirect("/")->with('message','You have successfully updated your personal data');
            }
            catch(\Exception $ex) {
                return redirect("/")->with('error',$ex);
                \Log::error($ex->getMessage());
            }
        }
        else{

            try{
                //dd($korisnik);
                $korisnik->UpdateuserWithoutPassword($id);
                return redirect("/")->with('message','You have successfully updated your personal data');
            }
            catch(\Exception $ex) {
                return redirect("/")->with('error',$ex);
                \Log::error($ex->getMessage());
            }
        }


    }

    public function form($id)
    {
      $usermy=new User();
      $this->data["user"]=$usermy->getUser($id);
      //dd($this->data['myacc']);
        return view('pages.updateuser', $this->data);
    }

}
