<?php
/**
 * Created by PhpStorm.
 * User: Milica
 * Date: 3/5/2019
 * Time: 1:01 AM
 */

namespace App\Models;


class Meni
{

    public $href;
    public $menuname;

    public function getAll()
    {

        $rezultat =
            \DB::table('menu')
                ->paginate(10);
        return $rezultat;
    }

    public function insert()
    {


            \DB::table('menu')
                ->insert([
                'href'=>$this->href,
                    'menuName' => $this->menuname
                ]);

    }

    public function update($id)
    {
        \DB::table('menu')
            ->where('idMenu', '=', $id)
               ->update([
                   'href'=>$this->href,
                   'menuName' => $this->menuname
               ]);

    }

    public function shoe($id)
    {

        $rezultat =
            \DB::table('menu')
                ->where('idMenu', '=', $id)
                ->first();
        return $rezultat;
    }
    public function delete($id)
    {

            \DB::table('menu')
                ->where('idMenu', '=', $id)
                ->delete();

    }
}