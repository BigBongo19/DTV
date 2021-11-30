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

    public function menuIndex()
    {
        $items = Menu::all();

        return view('admin.menu', [
            'items' => $items
        ]);
    }

    public function menuEditIndex($id)
    {
        $items = Menu::where("id", $id)->first();

        return view('admin.menuBewerken', [
            'items' => $items
        ]);
    }

    public function menuEdit(Request $request){
        $item = Menu::find($request->id);
        $item->name = $request->itemNaam;
        $item->price = $request->priceInput;
        $item->type = $request->typeInput;
        if(isset($request->enabled)){
            $item->enabled = $request->enabled;
        }else{
            $item->enabled = 0;
        }
        $item->save();
        return redirect('/admin/menu')->with('message','Het product is bijgewerkt!');
    }

    public function menuToevoegen()
    {
        return view('admin.menuToevoegen');
    }

    public function saveMenu(Request $request){
        $menu = new Menu;
        $menu->name = $request->itemNaam;
        $menu->price = $request->priceInput;
        $menu->type = $request->typeInput;

        if(isset($request->aanbieding)){
            $menu->sale = $request->aanbieding;
        }else{
            $menu->sale = 0;
        }

        $menu->save();
        return redirect('/admin/menu')->with('message','Het product is toegevoegd!');
    }

    public function deleteMenu($id)
    {
        Menu::find($id)->delete();
        return redirect('/admin/menu')->with('message', 'item is verwijderd!');
    }


}
