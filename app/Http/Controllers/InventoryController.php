<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InventoryController extends Controller
{

    public function index()
    {
        $inventory = Menu::all();

        return view('inventory.index', compact(('inventory')));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Inventory $inventory)
    {
        $inventory = Menu::all();
        return view('inventory.show',compact('inventory'));
    }

    
    public function edit(Inventory $inventory)
    {
        //
    }

    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    public function destroy(Inventory $inventory)
    {
        //
    }

    public function orders(){
        // $details = Order::all();
       
        $details = DB::table('orders')->join('menus', 'menus.id', '=', 'orders.menu_id')->join('customers', 'orders.customer_id','=', 'customers.id')->select('menus.name','orders.quantity','orders.price','customers.id','orders.status')->get();

        // dd($data);

        // $customers = Customer::with('orders')->get();

        //     foreach ($customers as $customer) {
        //     echo $customer->name;
        
        //     foreach ($customer->orders as $order) {
        //     echo $order->id;
            
        //         foreach ($order->menus as $product) {
        //             echo $product->name;
        //         }
        //     }
        // }
        // dd($customers);
        return view('inventory.orders', compact('details'));
    }
}
