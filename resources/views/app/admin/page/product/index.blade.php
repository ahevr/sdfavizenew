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
                    <a href="{{route("admin.product.create")}}" class="btn text-bg-danger rounded-5"><i class="fa-solid fa-plus"></i> Yeni Ürün Ekle</a>
{{--                    <a href="{{route("admin.product.create")}}" class="bg-orange-500 text-white px-4 py-2 border rounded-full hover:bg-red-500 hover:border-orange-500 hover:text-orange-500"><i class="fa-solid fa-plus"></i> Yeni Ürün Ekle</a>--}}
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
                                <th>Görsell</th>
                                <th>Ürün Adı</th>
                                <th>Aktif/Pasif</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center ml-2 font-extrabold text-red-500">Michael Right</td>
                                    <td class="text-center" >$15/hr</td>
                                    <td class="text-center" >UI/UX</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
