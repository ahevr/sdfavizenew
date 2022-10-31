<?php

namespace App\Exports;

use App\Models\Admin\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::get(["name","url","kod","image","category_id","created_by","update_by"]);
    }

    public function headings() :array{

        return [
            "name","url","kod","image","category_id","created_by","update_by"
        ];

    }
}
