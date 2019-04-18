<?php
/**
 * Created by PhpStorm.
 * User: Milica
 * Date: 3/7/2019
 * Time: 8:39 PM
 */

namespace App\Models;


class User
{

public $userName;
public $surname;
public $email;
public $password;
public $address;
public $mobilePhone;
    public $active;
    protected $table = 'user';


    public function Add() {
        try{

                \DB::table("user")->insert([
                    "userName" => $this->userName,
                    "surname" => $this->surname,
                    "email" => $this->email,
                    "password" => md5($this->password),
                    "address" => $this->address,
                    "mobileFone" => $this->mobilePhone

                ]);

        } catch(\Throwable $e) {
            \Log::critical("Failed to insert movie.");
            throw new \Exception($e);
        }

}

public function getUser($id){

        return \DB::table($this->table)
            ->where('idUser', '=', $id)
            ->first();
}

    public function UpdateuserWithoutPassword($id) {


            \DB::table("user")
                ->where('idUser', '=', $id)
                ->update([
                "userName" => $this->userName,
                "surname" => $this->surname,
                "email" => $this->email,
                    "active" => $this->active,
                "address" => $this->address,
                "mobileFone" => $this->mobilePhone
                ]);


    }


    public function Updateuser($id) {
        try{

            \DB::table("user")
                ->where('idUser', '=', $id)
                ->update([
                "userName" => $this->userName,
                "surname" => $this->surname,
                "email" => $this->email,
                "password" => md5($this->password),
                "active" =>$this->active,
                "address" => $this->address,
                "mobileFone" => $this->mobilePhone

            ]);

        } catch(\Throwable $e) {
            \Log::critical("Failed to update user.");
            throw new \Exception($e);
        }

    }

    public function checkUser($email, $password){
        return \DB::table($this->table)
            ->join('role', 'role.idRole', '=', 'user.idRole')
            ->where([
                ["email", "=", $email],
                ["password", "=", md5($password)]
            ])
            ->first();
    }

    public function getAll(){
        return \DB::table($this->table)
            ->get();

    }

    public function deleteUser($id){
        return \DB::table($this->table)->where('idUser', '=', $id)->delete();
    }

}