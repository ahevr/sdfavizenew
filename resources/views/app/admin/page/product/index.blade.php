@extends("app.admin.masterpage")
@section("title","Ege Sedef Avize Yönetim Paneli | Ürünler")
@section("pageHead")
    <div class="page-heading">
        <h3>Ürün Yönetim Paneli</h3>
    </div>
@endsection
@section("content")
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title" style="float: right">
                    <a href="{{route("admin.product.create")}}" class="btn text-bg-primary rounded-full hover:border-gray-300"><i class="fa-solid fa-plus"></i></a>
                </div>
                <h4 class="card-title">Ürünler Listesi</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>Görsel</th>
                                <th>Ürün Adı</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $rowProduct)
                                <tr>
                                    <td class="text-center w-1">
                                        <img src="{{asset("build/upload/product/".$rowProduct->image)}}" width="100" alt="{{$rowProduct->name}}">
                                    </td>
                                    <td class="text-center ml-2 font-extrabold">{{$rowProduct->name}}</td>
                                    <td class="text-center">
                                        <button
                                            data-url="{{route("admin.product.delete",$rowProduct)}}"
                                            class="btn btn-danger silButton">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <a href="{{route("admin.product.edit",$rowProduct)}}"
                                           class="btn btn-primary">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
