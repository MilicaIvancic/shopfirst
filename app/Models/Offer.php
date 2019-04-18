<?php
/**
 * Created by PhpStorm.
 * User: Milica
 * Date: 3/5/2019
 * Time: 4:14 AM
 */

namespace App\Models;


class Offer
{

    public function getAll()
    {

        $rezultat =
            \DB::table('ouroffer')
                ->get();
        return $rezultat;
    }
}