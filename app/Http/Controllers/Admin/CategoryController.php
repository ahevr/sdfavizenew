<?php

namespace App\Http\Controllers\Admin;

use App\Helper\urlHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $allCategories  = Category::all();
        $categories     = Category::where('parent_id', 0)->get();
        return view("app.admin.page.category.index")
            ->with("categories",$categories)
            ->with("allCategories",$allCategories);

    }
    public function store(Request $request){

        $request->validate(["name" => "required|min:2|max:100",]);

        $input = $request->all();

        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        $input["url"] = urlHelper::permalink($request->name);

        Category::create($input);

        return back()->with("toast_success","Kategori Başarılı Bir Şekilde Eklendi");

    }

    public function delete($id){

        $category = Category::findOrFail($id);

        $category->delete();

        return back()->with("toast_success","Kategori Başarılı Bir Şekilde Silindi");

    }

    public function deleteSub($id){

        $category = Category::findOrFail($id);

        $category->delete();

        return back()->with("toast_success","Alt Kategori Başarılı Bir Şekilde Silindi");

    }
}
