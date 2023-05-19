<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function frontend(){
        
        $products = Menu::all();
        return view('dashboard',compact('products'));
    }
    public function index(){
        // if(Auth::guard('admin')->check()){
            return view('customer.login');
        // }
    }

    public function postLogin(Request $request){
        $customer = new Customer();
        $data = $request->all();

        if(Auth::guard('customer')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
            //  dd("success");
            $products = Menu::all();
            
            if(auth()->guard('customer')->check()){
                $customer = auth()->guard('customer')->user();
              
                session()->put('customer_id', $customer->id);
                session()->put('customer_email', $customer->email);
            }

            // return view('product.products',compact('products'));
            return redirect()->route('cartIndex');
            
        }else{
            //  dd ("sorry");
             return redirect()->back()->with('error message','sorry couldnt login');
        }
       
    }

    public function dashboard()
    {
        if(Auth::check()){
            // return view('frontend.index');
            return redirect()->route('customer');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
        return view('dashboard');
    }

    public function registration()
    {
        return view('customer.registration');
    }

    public function postRegistration(Request $request)
    {  

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|min:10',
            'city' => 'required',
            'street' => 'required',
        ]);
           
        $data = $request->all();
        $data['password'] = bcrypt($request ->password);
        $user = Customer::create($data);
        return redirect()->route('customer-login')->withSuccess('Great! You have Successfully loggedin');
    }

    public function create(array $data)
    {
        //dd($data);
      return Customer::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'phone' => $data['phone'],
        'city' => $data['city'],
        'street' => $data['street']
      ]);
    }

    public function logout() {
        
      Auth::guard('customer')->logout();
      session::flash('info_message', 'Logout');
      Session::forget('cart');
  
        return redirect()->route('customer-login');
    }

    public function checkMD()
    {
    	dd('You are in Controller Method');
    }

    public function cart($id){
        $item= new Menu();
        $item = $item->find($id);
        $items = Menu::select('name')->where('id',$id)->first();
        // dd($items);
        return view('frontend.cart',compact('item', 'items'));

        // new code to try 

        // $cart = session()->get('cart', []);
  
        // if(isset($cart[$id])) {
        //     $cart[$id]['quantity']++;
        // } else {
        //     $cart[$id] = [
        //         "name" => $item->name,
        //         "quantity" => 1,
        //         "price" => $item->price,
        //     ];
        // }
          
        // session()->put('cart', $cart);
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    
    public function data($id){
        $item= Menu::all();
        $item = $item->find($id);

        $cid=Auth::user()->id;
        dd($cid);



        $user = Customer::with('id')->first();
    }
}
