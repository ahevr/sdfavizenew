<?php

namespace App\Http\Controllers\Admin;

use App\Helper\urlHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Katalog;
use App\Models\KatalogImage;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class KatalogController extends Controller
{
    public function index(){

        $katalog = Katalog::orderBy("id","DESC")->paginate(10);
        return view("app.admin.page.katalog.index")->with("katalog",$katalog);

    }

    public function create(){

        return view("app.admin.page.katalog.create");

    }

    public function store(ProductRequest $request){

        $katalog = new Katalog();
        $katalog->name = $request->name;
        $katalog->link = $request->link;
        $katalog->url = urlHelper::permalink($request->name);
        $katalog->image = $request->image;
        $katalog->save();
        return redirect("admin/katalog")->with("toast_success","$request->name". " Adlı Katalog Başarılı Bir Şekilde Eklendi");

    }

    public function delete($id){

        $blog = Katalog::findOrFail($id);
        $blog->delete();
        return back()->with("toast_success","Ürün Başarılı Bir Şekilde Silindi");

    }

    public function galeri($id){

        $galeri = Katalog::findOrFail($id);
        $katalog = KatalogImage::where("katalogs_id",$id)->get();
        return view("app.admin.page.katalog.galeri")->with("galeri",$galeri)->with("katalog",$katalog);

    }

    public function galeriStore(Request $request,$katalogs_id){

        $galeri = new KatalogImage();
        $galeri->image = $request->image;
        $galeri->katalogs_id = $katalogs_id;
        $galeri->save();
        return redirect("admin/katalog")->with("toast_success","Katalog Başarılı Bir Şekilde Eklendi");

    }
}
