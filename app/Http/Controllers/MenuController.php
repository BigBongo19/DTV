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

    public function saveMenu(Request $request){
        $menu = new Menu;
        $menu->name = $request->itemNaam;
        $menu->price = $request->priceInput;
        $menu->type = $request->typeInput;
        $menu->img_path = $request->file;
        if(isset($request->enabled)){
            $menu->enabled = $request->enabled;
        }else{
            $menu->enabled = 0;
        }

        $menu->save();
        return redirect('/admin/menu')->with('message','Het product is toegevoegd!');
    }


}
