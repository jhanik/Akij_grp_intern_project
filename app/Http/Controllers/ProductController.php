<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


class ProductController extends Controller
{
    //all product list
    
    public function showall(Request $request){

      if($request->has('price')){

        $products = Product::where('price', $request->price)->paginate(10);
      }
      else {
  
        $products= Product::paginate(10);
      }
    
        
         return view('products',compact('products'));
     }

     //add product

     public function store(Request $request){

      $this->validate($request, [
       
        'name' => 'required',
       'price'=> 'required',
       'expiredate'=> 'required'
       
    ]);

    
   
    $productmodel = new Product;

    
     
      $productmodel->name = $request->name;
      $productmodel->price = $request->price;
      $productmodel->expiredate = $request->expiredate;
      $productmodel->save();
     
     
        return redirect('add-product')->with('success', true)->with('message','new product added');
    }

//edit product
     public function edit($id){


      $editproducts = Product::find($id);

 
        return view('edit-product',compact('editproducts'));
     }
//update product

     public function update(Request $request, $id){
               
  
      $this->validate($request, [
       
        'name' => 'required',
       'price'=> 'required',
       'expiredate'=> 'required'
       
    ]);


    
     
      $productmodel = Product::find($id);
     
      $productmodel->name = $request->name;
      $productmodel->price = $request->price;
      $productmodel->expiredate = $request->expiredate;
      $productmodel->save();
     
     
    

        return redirect('products')->with('success', true)->with('message','product updated ');
    }
   //delete product
    public function delete($id){


      $deleteproducts= Product::find( $id);
      $deleteproducts->delete();


      return redirect('/products')->with('success', true)->with('message','Product deleted');
   }


   //view product
   public function view($id){


    $singleproducts= Product::where('id', $id)->get();


     return view('view-product',compact('singleproducts'));
 }
     
     

    }
    