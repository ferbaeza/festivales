<?php

namespace App\Controllers\PublicSection;
use App\Controllers\BaseController;


class LogoutController extends BaseController
{
    public function logout()
    {
        $session = session();
        $session->destroy();

        //return view('index');
        return redirect()->route('index');
    }
}
