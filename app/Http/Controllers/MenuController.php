<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller{
public function index()
{
    $items = Menu::all();

    return view('menu', compact('items'));
}
}
