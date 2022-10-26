<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
