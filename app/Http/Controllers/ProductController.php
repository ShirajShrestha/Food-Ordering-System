<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {

        $products = Menu::all();
        return view('product.products', compact('products'));
    }
  
    
    public function cart()
    {
        return view('product.cart');
    }
  
    
    public function addToCart($id)
    {
        $product = Menu::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "id"=>$id
            ];
        }
          
        session()->put('cart', $cart);
        
        
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function store(){
        $data = session()->all();
        $customer=session('customer_id');
       
        $data = session()->get('cart');
        // dd($data);
        foreach($data as $item){
            $product_name = $item['name'];
            $product_quantity = $item['quantity'];
            $product_price = $item['price'];
            $product_id = $item['id'];
            // dd($product_id);

            $order = new Order;
            $order->customer_id = $customer;
            $order->menu_id = $product_id;
            $order->quantity = $product_quantity;
            $order->price = $product_price;
            $order->status = 'pending';
            $order->save();
        }
        Session::forget('cart');
        return redirect()->route('cartIndex');
    }

    public function check(){
        return view('product.main');
    }

    public function history(){
        $orders=Order::all();
        $order = Order::with('menus')->get();

        $customer=session('customer_id');
        
        $data = DB::table('orders')->join('menus', 'orders.menu_id', '=', 'menus.id')->select('menus.name','orders.quantity','orders.price')->where('customer_id',$customer)->get();

        return view('product.history',compact('orders','data'));
    }

    public function search(Request $request){
        $search = $request['search']??"";
        if($search != ""){
            $products = Menu::where('name','LIKE', "%$search%")->get();
        }
        else{
            return redirect()->route('cartIndex');
        }
        return view('product.search',compact('search','products'));
    }
}
