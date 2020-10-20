<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

use App\Models\Subcategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Contracts\InstanceIdentifier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller extends BaseController
{
    protected $base_route = 'frontend.index';
    protected $panel = 'Home';
    function  addtocart(Request $request){

        Cart::add(['id' => $request->input('id'), 'name' => $request->input('name'), 'qty' => $request->input('quantity'), 'price' => $request->input('amount'),'weight' => $request->input('amount')]);
//        return back();
        $data['carts'] = Cart::content();
        $data['page_title'] = 'Cart List';
        $this->panel='Cart List';
        return view($this->loadDataToView('cart.index'), compact('data'));

    }

    function  listcart(){
        $data['carts'] = Cart::content();
//        dd($data['carts']);
//        $data['title'] = 'Cart List';
        $this->panel='Cart List';

        return view($this->loadDataToView('cart.index'), compact('data'));


    }

    function  deletecart($rowId){
        Cart::remove($rowId);
        return back();

    }
    function  checkout(){
        $data['carts'] = Cart::content();
        return view($this->loadDataToView('cart.checkout'), compact('data'));
    }

}
?>