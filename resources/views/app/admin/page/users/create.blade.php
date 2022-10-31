@extends("app.admin.masterpage")
@section("title","Ege Sedef Avize Yönetim Paneli | Kullanıcı Ekle")
@section("pageHead")
    <div class="page-heading">
        <h3>Kullanıcı Yönetim Paneli</h3>
    </div>
@endsection
@section("content")
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kullanıcı Ekle</h4>
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
                <form action="{{route("admin.users.userStore")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Kullanıcı Adı</label>
                                <input type="text" class="form-control" id="basicInput" name="name" placeholder="Kullanıcı Adı">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">E mail</label>
                                <input type="text" class="form-control" id="basicInput" name="email" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Şifre</label>
                                <input type="text" class="form-control" id="basicInput" name="password" placeholder="Email">
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
