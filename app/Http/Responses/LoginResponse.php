<?php 

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as FortifyLoginResponse;

class loginResponse implements FortifyLoginResponse{
    public function toResponse($request)
    {
        return redirect('/home');
    }
}