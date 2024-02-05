<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && auth()->user()->is_admin) {
            Session::forget('cart');
            $products = Product::all();
            //return "Login by admin";
            return view('admin.dashboard',[
                'products' => $products
                ]);
        }
        if (Auth::attempt($credentials) && auth()->user()->is_admin==false) {
            Session::forget('cart');
            return redirect('/');            
        }
        return view('auth.login');
    }

    public function logoutAction()
    {
        Session::flush();        
        Auth::logout();
        return Redirect('/');
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return "registration success";
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function productDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('dashboardSub');
    }

    public function productEdit($id)
{
    $product = Product::find($id);
return view('admin.productEdit',[
    'product' => $product
    ]);
}

public function productUpdate($id)
{    
        $product = Product::find($id);
        $product->product_name = request()->product_name;
        $product->price = request()->price;
        $product->update();

    return redirect()->route('dashboardSub');
}

public function productAdd()
{
return view('admin.productAdd');
}

public function productCreate()
{
    $validator = validator(request()->all(), [
        'product_name' => 'required',
        'price' => 'required',
        ]);
        if($validator->fails()) {
        return back()->withErrors($validator);
        }
        $product = new Product;
        $product->product_name = request()->product_name;
        $product->price = request()->price;
        $product->save();
        
return redirect()->route('dashboardSub');
}

public function dashboardSub()
{
    $products = Product::All();
return view('admin.dashboard',[
    'products' => $products
    ]);
}
}
