@extends("app.admin.masterpage")
@section("title","Kategoriler | B2B Ege Sedef Aydınlatma")
@section("pageHeader")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kategori Yönetim Paneli</h3>
                <p class="text-subtitle text-muted">Loottr | Admin Panel</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item disabled">Kategoriler</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
    <hr>

    <form method="post" action="{{route("admin.category.addCategory")}}">
        @csrf
        <div class="content-header">
            <div>
                <h4 class="content-title card-title">Kategori Listesi</h4>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <form>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Kategori Adı</label>
                                <input type="text" class="form-control" name="name"  placeholder="Kategori Adı">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Alt Kategori</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">Alt Kategori Seç</option>
                                    @foreach($allCategories as $key)
                                        <option value="{{$key->id}}">{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Sil</th>

                                    <th>Alt Kategorisi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $rowCategory)
                                    <tr>
                                        <td><b>{{ $rowCategory->name }}</b></td>
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('admin.category.deleteCategory',$rowCategory) }}"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                        <td>
                                            @if(count($rowCategory->childs))
                                                @include('app.admin.page.category.manageChild',['childs' => $rowCategory->childs])
                                            @endif
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
    </form>
@endsection
