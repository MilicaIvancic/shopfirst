<?php
/**
 * Created by PhpStorm.
 * User: Milica
 * Date: 3/18/2019
 * Time: 12:25 PM
 */

namespace App\Models;


class Useractivities
{

    public function userActivity(){

        return \DB::table("useractivities")
            ->paginate(16);
    }

    public function insert($name, $email, $activity){
        \DB::table("useractivities")->insert([
            "email" => $email,
            "name" => $name,
            "activiti" => $activity,

        ]);


    }
}