<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products',compact('products'));
    } 

    public function show($id){
        $products = Product::all();
        $my_product = Product::find($id);
        return view('product-detail',compact('products','my_product'));
    }

    public function my_cart(Request $request ,$id){
        $user = User::find(Auth::id());
        $product = Product::find($id);


        if ($user->products()->where('product_id', $product->id)->exists()) {
            // العلاقة موجودة
            $quantity = $user->products()->find($product->id)->pivot->quantity;
            $newQuantity = intval($quantity) + intval($request->quantity);

            $user->products()->updateExistingPivot($product->id, ['quantity' => $newQuantity]);
        } else {
            // العلاقة غير موجودة

            $user->products()->attach($product->id, ['quantity' => intval($request->quantity)]);
        }
        


        

        
        $my_products = $user->products()->withPivot('quantity')->get();
        
        
        return view('my_cart',compact('my_products'));
    } 

    public function removeFromCart($id){
        
        $user = User::find(Auth::id());
        $user->products()->detach($id);


        // إعادة تحميل الصفحة بعد حذف العنصر

        $my_products = $user->products()->withPivot('quantity')->get();
        return view('my_cart',compact('my_products'));

    }

    public function show_my_cart(){
        $user = User::find(Auth::id());        
        $my_products = $user->products()->withPivot('quantity')->get();
        
        return view('my_cart',compact('my_products'));
    } 

    public function upload(Request $request){

        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName =  $request->product_name.'.'.$image->extension();
        $image->move(public_path('images/product'), $imageName);

        // حفظ رابط الصورة في قاعدة البيانات
        Product::create([
            'name' => $request->product_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'path' =>  'images/product/' .$imageName,
        ]);

        return redirect('/')->with('success', 'تم رفع الصورة بنجاح.');
        // return $imageName;
    
    }

    public function checkout(Request $request){
        $user = User::find(Auth::id());        
        $my_products = $user->products()->withPivot('quantity')->get();
        foreach($my_products as $my_product){
            $product = Product::find($my_product->id);
            if (!$product) {
                return 'Sorry, but '. $product->name .' is currently unavailable  ';
            }elseif($product->quantity < $my_product->pivot->quantity){
                return 'Sorry, but the amount of '. $product->name .' you want is not available ';
            }
        }
        foreach($my_products as $my_product){
            $product = Product::find($my_product->id);
            $product->update(['quantity' => $product->quantity - $my_product->pivot->quantity]);
            if($product->quantity === 0){
                $product->delete();
            }
        }

        return $request;
    } 

}
