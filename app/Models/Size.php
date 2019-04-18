<?php
/**
 * Created by PhpStorm.
 * User: Milica
 * Date: 3/15/2019
 * Time: 11:59 PM
 */

namespace App\Models;


class Size
{
 public function getAll(){

     return \DB::table('size')->get();
 }
}