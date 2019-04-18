<?php
/**
 * Created by PhpStorm.
 * User: Milica
 * Date: 2/28/2019
 * Time: 10:11 PM
 */

namespace App\Models;


class Category
{


    private $table = 'category';

    public function getAll()
    {

        $rezultat =
            \DB::table($this->table)
                ->whereNull('subcategory')
                ->get();
        return $rezultat;
    }

    public function getAllCategory(){

        return \DB::table($this->table)->get();
    }
}