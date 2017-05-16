<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getFirstName() {
        /*
         *  https://www.w3schools.com/php/func_array_list.asp
         */
        $user = Auth::user()->name;
        $username = list($user) = explode(' ', $user);
        $firstName = $username[0];

        return $firstName;
     }
}
