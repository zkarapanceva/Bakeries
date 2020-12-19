<?php

namespace App\Http\Controllers;

use App\Bakery;
use Illuminate\Http\Request;

class BakeryController extends Controller
{
    public function index(string $city) {
        return Bakery::where('addr_city', $city)->get();
    }
}
