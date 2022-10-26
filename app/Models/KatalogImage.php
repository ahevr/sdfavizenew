<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogImage extends Model
{
    protected $table = "katalogimage";

    protected $guarded = [];


    public function setImageAttribute($value){
        if($value) {
            $file =$value;
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('build/upload/kataloglar/', $filename);
            $this->attributes['image'] = $filename;
        }
    }
}
