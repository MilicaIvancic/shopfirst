<?php
/**
 * Created by PhpStorm.
 * User: Milica
 * Date: 3/13/2019
 * Time: 6:49 PM
 */

namespace App\Models;
//use Illuminate\Database\Eloquent\Model;



class Card //extends Model
{

public $sum;

public function getSum($id){
    \DB::table('itemcard')
        ->select('sum')
        ->where('idItemcard', $id)
        ->first();
}

public function existCard($id) {
return \DB::table('card')
    ->where([
    ['idUser', '=', $id],
    ['StatusCard', '=', 0]
            ])
->first();
}

    public function idCard($id) {
        return \DB::table('card')
            ->select('idCard')
            ->where([
                ['idUser', '=', $id],
                ['StatusCard', '=', 0]
            ])
            ->first();
    }


    public function createCard($id) {
        return \DB::table('card')
            ->insert(['idUser' => $id]);
    }

    public function cardProductEgzist($id) {
        return \DB::table('card')
            ->join('itemcard AS i' , 'i.idCard', '=', 'card.idCard')
            ->where('card.idCard', '=', $id)
            ->first();
    }

    public function cardProduct($id) {
        return \DB::table('card')
            ->select('p.image', 'p.alt', 'p.idProduct' , 'p.nameProduct', 'a.articlePrice', 'i.idCard' , 'i.idItemcard', 'i.sum')
            //->groupBy('p.image', 'p.alt', 'p.idProduct' , 'p.nameProduct', 'a.articlePrice', 'i.idCard' , 'i.idItemcard', 'i.sum')
            ->join('itemcard AS i' , 'i.idCard', '=', 'card.idCard')
            ->join('products AS p' , 'p.idProduct', '=', 'i.idProduct')
            -> join("price_article AS a" , "a.idProduct" , "=", "p.idProduct")
            ->where([['card.idCard', '=', $id],
                ['a.active', '=', 1]])
            ->get();
    }

    public function totalPrice($id){
        return \DB::table('card')
            ->select(\DB::raw('SUM(a.articlePrice * i.sum) as total_price'))
            //->groupBy('p.image', 'p.alt', 'p.idProduct' , 'p.nameProduct', 'a.articlePrice', 'i.idCard' , 'i.idItemcard', 'i.sum')
            ->join('itemcard AS i' , 'i.idCard', '=', 'card.idCard')
            ->join('products AS p' , 'p.idProduct', '=', 'i.idProduct')
            -> join("price_article AS a" , "a.idProduct" , "=", "p.idProduct")
            ->where([['card.idCard', '=', $id],
                ['a.active', '=', 1]])
            ->first();
    }

    public function getUsrCard($id) {
        return \DB::table('card')
            ->where([
                ['idUser', '=', $id],
                ['StatusCard', '=', 0]
            ])
            ->first();
    }

    public function addItemTocard($id, $card, $sum, $size) {
        try{\DB::table('itemcard')
            ->insert([
                'idProduct' => $id,
                'idCard'=>$card,
                'sum' => $sum,
                'size' => $size
            ]);
    }
        catch(\Throwable $e) {
        \Log::critical("Failed add to card.");
        throw new \Exception($e);
}}

public function updateItemcard($id){
    return \DB::table('itemcard')
        ->where('idItemcard', $id)
        ->update([
            'sum' =>  \DB::raw('sum+1')
        ]);
}

    public function loverSum($id){
        return \DB::table('itemcard')
            ->where('idItemcard', $id)
            ->update([
                'sum' =>  \DB::raw('sum-1')
            ]);
    }

    public function delete($id){
        return \DB::table('itemcard')
            ->where('idItemcard', $id)
            ->delete();
    }

    public function findSum($id){
        return \DB::table('itemcard')
            ->where('idProduct', $id)
            ->first();
    }

    public function finisShop($id){

        return \DB::table('card')
            ->where('idCard', $id)
            ->update(['StatusCard' => 1]);
    }

    public function userOrders($id){

     return \DB::table('card')
            ->select('p.image', 'p.alt', 'p.idProduct' , 'p.nameProduct', 'a.articlePrice', 'i.idCard' , 'i.idItemcard', 'i.sum')
            //->groupBy('p.image', 'p.alt', 'p.idProduct' , 'p.nameProduct', 'a.articlePrice', 'i.idCard' , 'i.idItemcard', 'i.sum')
            ->join('itemcard AS i' , 'i.idCard', '=', 'card.idCard')
            ->join('products AS p' , 'p.idProduct', '=', 'i.idProduct')
            -> join("price_article AS a" , "a.idProduct" , "=", "p.idProduct")
            ->where([['card.idUser', '=', $id],
                ['StatusCard', '=', 1]])
            ->paginate(5);
    }

    public function totalPriceFinishCard($id){
        return \DB::table('card')
            ->select(\DB::raw('SUM(a.articlePrice * i.sum) as total_price'))
            //->groupBy('p.image', 'p.alt', 'p.idProduct' , 'p.nameProduct', 'a.articlePrice', 'i.idCard' , 'i.idItemcard', 'i.sum')
            ->join('itemcard AS i' , 'i.idCard', '=', 'card.idCard')
            ->join('products AS p' , 'p.idProduct', '=', 'i.idProduct')
            -> join("price_article AS a" , "a.idProduct" , "=", "p.idProduct")
            ->where([['card.idUser', '=', $id],
                ['StatusCard', '=', 1]])
            ->first();
    }

    public function existOrderUser($id) {
        return \DB::table('card')
            ->where([
                ['idUser', '=', $id],
                ['StatusCard', '=', 1]
            ])
            ->first();
    }
}