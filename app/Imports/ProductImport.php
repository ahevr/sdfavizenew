<?php

namespace App\Imports;

use App\Models\Admin\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class ProductImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            "name"    => $row["name"],
            "url"   => $row["url"],
            "kod"   => $row["kod"],
            "image"   => $row["image"],
            "category_id"   => $row["category_id"],
            "created_by"   => $row["created_by"],
            "update_by"   => $row["update_by"],
        ]);
    }
}
