@extends("app.admin.masterpage")
@section("title","Ege Sedef Avize Yönetim Paneli | Ürün Ekle")
@section("pageHead")
    <div class="page-heading">
        <h3>Ürün Yönetim Paneli</h3>
    </div>
@endsection
@section("content")


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ürün Ekle</h4>
            </div>

            <div role="alert">
                @if ($errors->any())
                    <hr>
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Bir Hata Var !
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        @foreach($errors->all() as $errors)
                            <li>
                                {{$errors}}
                            </li>
                        @endforeach
                    </div>
                    <hr>
                @endif
            </div>

            <div class="card-body">
                <form action="{{route("admin.product.store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Ürün Adı</label>
                                <input type="text" class="form-control" id="basicInput" name="name" placeholder="Ürün Adı" value="{{ old('name') }}">

                            </div>

                            <div class="form-group">
                                <label for="basicInput">Ürün Kodu</label>
                                <input type="text" class="form-control" id="basicInput" name="kod" placeholder="Ürün Kodu" value="{{ old('kod') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Kategori</label>
                                <select name="category_id" class="form-control">
                                    <option value="1">Kategori Seçiniz</option>
                                    @foreach($category as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="input-upload">
                                    <label for="roundText">Görsel:</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button id="submit" type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
