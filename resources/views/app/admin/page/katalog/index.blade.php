@extends("app.admin.masterpage")
@section("title","Ege Sedef Avize Yönetim Paneli | Ürünler")
@section("pageHead")
    <div class="page-heading">
        <h3>Katalog Yönetim Paneli</h3>
    </div>
@endsection
@section("content")
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title" style="float: right">
                    <a href="{{route("admin.katalog.create")}}" class="btn text-bg-primary rounded-full hover:border-gray-300"><i class="fa-solid fa-plus"></i></a>
                </div>
                <h4 class="card-title">Katalog Listesi</h4>
            </div>
            @if(count($katalog) == 0 )

                <div class="holder ">
                    <div class="row justify-content-center">
                        <div class="card text-center">
                            <div class="card-header text-center">
                                <b>Uyarı</b>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Herhangi Bir Katalog Bulunmamaktadır.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @else
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
                                @foreach($katalog as $rowKatalog)
                                    <tr>
                                        <td class="text-center w-1">
                                            <img src="{{asset("build/upload/kataloglar/".$rowKatalog->image)}}" width="300" alt="{{$rowKatalog->name}}">
                                        </td>
                                        <td class="text-center ml-2 font-extrabold">{{$rowKatalog->name}}</td>
                                        <td class="text-center">
                                            <button
                                                data-url="{{route("admin.katalog.delete",$rowKatalog)}}"
                                                class="btn btn-danger silButton">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                            <a href="{{route("admin.katalog.galeri",$rowKatalog)}}"
                                               class="btn btn-primary">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
