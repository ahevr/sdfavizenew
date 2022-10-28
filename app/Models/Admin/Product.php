<?php

namespace App\Models\Admin;

use App\Helper\urlHelper;
use App\Http\Requests\ProductRequest;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $table = "products";

    protected $guarded = [];

    public function setImageAttribute($value){
        if($value) {
            $file =$value;
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('build/upload/product/', $filename);
            $this->attributes['image'] = $filename;
        }
    }

    public static function boot(){

        parent::boot();

        static::creating(function ($model) {
            $model->update_by  = 0;
            $model->created_by = Auth::guard("web")->id();
            $model->url        = urlHelper::permalink($model->name);
        });

    }
}
