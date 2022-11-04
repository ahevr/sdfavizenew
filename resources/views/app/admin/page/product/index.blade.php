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
            @if($product->isEmpty())
                <div class="card text-center">
                    <div class="card-header text-center">
                        <b class="text-red-500 text-xl" >Uyarı</b>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Herhangi Bir Ürün Bulunmamaktadır....</h5>
                    </div>
                </div>
            @else
            <div class="card-content">
                <div class="card-body">


{{-- **********************************************************! burası excel ile ürün ekleme kısmı --}}

{{--                    <div class="container mt-5 text-center">--}}
{{--                        <h2 class="mb-4">--}}
{{--                            Laravel 7 Import and Export CSV & Excel to Database Example--}}
{{--                        </h2>--}}
{{--                        <form action="{{ route('admin.product.file-import') }}" method="POST" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">--}}
{{--                                <div class="custom-file text-left">--}}
{{--                                    <input type="file" name="file" class="custom-file-input" id="customFile">--}}
{{--                                    <label class="custom-file-label" for="customFile">Choose file</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <button class="btn btn-primary">Import data</button>--}}
{{--                            <a class="btn btn-success" href="{{ route('admin.product.file-export') }}">Export data</a>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{-- **********************************************************! ##burası excel ile ürün ekleme kısmı --}}



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
                        <div class="card-body">
                            <nav aria-label="Page navigation example flex items-center space-x-1">
                                <ul class="pagination flex justify-content-end px-4 py-2 rounded-full">
                                    {{$product->onEachSide(0)->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
