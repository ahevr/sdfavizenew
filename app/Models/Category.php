<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $guarded = [];

    public function childs() {

        return $this->hasMany(Category::class,'parent_id','id') ;

    }
}
