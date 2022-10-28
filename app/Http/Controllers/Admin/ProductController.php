<?php

namespace App\Http\Controllers\Admin;

use App\Helper\urlHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Admin\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){

        $product= Product::orderBy("id","DESC")->paginate(10);
        return view("app.admin.page.product.index")
            ->with("product",$product);

    }

    public function create(){

        $category = Category::all();
        return view("app.admin.page.product.create")->with("category",$category);

    }

    public function store(ProductRequest $request){

//        **********************YÖNTEM 1******************************************

        Product::create($request->all());

//        *********************YÖNTEM 2*******************************************

//        Product::create([
//            "category_id"=> $request->category_id,
//            "name"       => $request->name,
//            "kod"        => $request->kod,
//            "image"      => $request->image,
//        ]);

//        *********************YÖNTEM 3*******************************************


//        $products = new Product();
//        $products->url = urlHelper::permalink($request->name);
//        $products->category_id = $request->category_id;
//        $products->created_by = Auth::guard("web")->id();
//        $products->update_by = 0;
//        $products->name  = $request->name;
//        $products->kod   = $request->kod;
//        $products->image = $request->image;
//        $products->save();


//        ****************************************************************

        return to_route('admin.product.index')->with("toast_success","$request->name". " Adlı Ürün Başarılı Bir Şekilde Eklendi");

    }

    public function edit($id){

        $category = Category::all();
        $product = Product::findOrFail($id);
        return view("app.admin.page.product.edit")->with("category",$category)->with("product",$product);
    }

    public function update(ProductRequest $request,$id){

        $product = Product::findOrFail($id);
        $product->url = urlHelper::permalink($request->name);
        $product->category_id = $request->category_id;
        $product->update_by = Auth::guard("web")->id();
        $product->name  = $request->name;
        $product->kod   = $request->kod;
        $product->image = $request->image;
        $product->update();
        return redirect("admin/product")->with("toast_success","$request->name". " Adlı Ürün Başarılı Bir Şekilde Güncellendi");
    }

    public function delete($id){

        $blog = Product::findOrFail($id);
        $blog->delete();
        return back()->with("toast_success","Ürün Başarılı Bir Şekilde Silindi");

    }
}
