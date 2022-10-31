<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashBoardController extends Controller
{
    public function login(){

        return view("auth.login");
    }

    public function check(Request $request){

        $request->validate(["email" => "required|email|exists:users,email"]);

        $creds = $request->only("email", "password");

        if (Auth::guard("web")->attempt($creds)) {

            return redirect()->route("admin.index")
                ->with("toast_info", "Hoş Geldiniz" . " " . Auth::guard("web")->user()->name);

        } else {

            return redirect()->route("admin.login")
                ->with("fail", "E-posta veya Şifre Hatalı");
        }

    }

    public function index(){

        return view("app.admin.page.dashboard.index");

    }

    public function getUser(){

        $users = User::all();
        return view("app.admin.page.users.index")->with("users",$users);

    }

    public function userCreate(){

        return view("app.admin.page.users.create");
    }

    public function userStore(Request $request){


        $request->validate([
            "name"     => "required|min:2|max:80",
            "email"    => "required",
            "password" => "required"
        ]);

        $users = new User();

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);

        $users->save();

        return redirect("admin/users")->with("toast_success","$request->name". " Adlı Ürün Kullanıcı Bir Şekilde Eklendi");

    }

    public function userEdit($id){

        $users = User::findOrFail($id);

        return view("app.admin.page.users.edit")->with("users",$users);

    }

    public function userUpdate(Request $request,$id){

        $input = $request->all();

        if(!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);

        return back()->with("toast_success","Kullanıcı Başarılı Bir Şekilde Güncellendi");

    }

    public function logout(){

        Auth::guard("web")->logout();

        return redirect("admin/login")->with("toast_success","Çıkış Başarılı");

    }
}
