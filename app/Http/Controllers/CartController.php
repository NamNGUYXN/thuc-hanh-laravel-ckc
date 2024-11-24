<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get('products');

        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities(
                $productsInCart,
                $productsInSession
            );
        }

        $viewData = [];
        $viewData["title"] = "Cart - Online Store";
        $viewData["subtitle"] = "Shopping Cart";
        // $viewData["subtitle"] = session('check');
        $viewData["total"] = $total;
        $viewData["products"] = $productsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id)
    {
        $products = $request->session()->get('products');
        if (isset($products[$id])) {
            $products[$id] += $request->input('quantity');
        }
        else {
            $products[$id] = $request->input('quantity');
        }

        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');

        return back();
    }

    public function deleteSingle(Request $request, $id)
    {
        $products = $request->session()->get('products');
        unset($products[$id]);
        
        $request->session()->put('products', $products);
        
        return back();
    }
}
