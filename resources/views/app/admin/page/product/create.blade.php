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
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{route("admin.product.store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Ürün Adı</label>
                                <input type="text" class="form-control" id="basicInput" name="name" placeholder="Ürün Adı">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Ürün Kodu</label>
                                <input type="text" class="form-control" id="basicInput" name="kod" placeholder="Ürün Kodu">
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
