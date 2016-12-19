<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class VueController extends Controller {

    public function index() {
        return view('vue.index');
    }

}