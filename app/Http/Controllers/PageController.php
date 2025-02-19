<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response; 


class PageController extends Controller
{
    public function index(){
        return('Hello World');
    }

    public function about(){
        return('Keysha Arindra Fabian (2341760193)');
    }

    public function articles($id = null)
    {
        return 'Halaman Artikel dengan Id ' . $id;
    }
}
