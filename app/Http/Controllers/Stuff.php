<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Stuff extends BaseController {

    public function sth($what) {
        return view('newView', ['sth' => $what]);
    }
}
