<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Stuff extends BaseController {

    public function sth() {
        return view('newView', ['sth' => 'Stuff']);
    }
}
