@extends("app.admin.masterpage")
@section("title","Ege Sedef Avize Yönetim Paneli | Katalog Ekle")
@section("pageHead")
    <div class="page-heading">
        <h3>Katalog Yönetim Paneli</h3>
    </div>
@endsection
@section("content")
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Katalog Ekle</h4>
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
                <form action="{{route("admin.katalog.galeriStore",$galeri)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
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
            <hr>
            <div class="card-body">
                <table class="table table-lg table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>PDF</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($katalog as $rowGaleri)
                        <tr>
                            <td> {{$rowGaleri->image}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
