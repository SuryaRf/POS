<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function foodBeverage(){
        return view('POS.foodBeverage');
    }
    public function beautyHealth(){
        return view('POS.beautyHealth');
    }

    public function homeCare(){
        return view('POS.homeCare');
    }

    public function babyKid(){
        return view('POS.babyKid');
    }
}
