@extends("app.admin.masterpage")
@section("title","Ege Sedef Avize Yönetim Paneli | Kullanıcılar")
@section("pageHead")
    <div class="page-heading">
        <h3>Kullanıcı Yönetim Paneli</h3>
    </div>
@endsection
@section("content")
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title" style="float: right">
                    <a href="{{route("admin.users.userCreate")}}" class="btn text-bg-primary rounded-full hover:border-gray-300"><i class="fa-solid fa-plus"></i></a>
                </div>
                <h4 class="card-title">Kullanıcı Listesi</h4>
            </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>Adı</th>
                                    <th>E-Mail</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $rowusers)
                                    <tr>
                                        <td class="text-center ml-2 font-extrabold">{{$rowusers->name}}</td></td>
                                        <td class="text-center ml-2 font-extrabold">{{$rowusers->email}}</td></td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('admin.users.userEdit',$rowusers) }}">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <button
                                            data-url="{{route("admin.users.userDelete",$rowusers)}}"
                                            class="btn btn-danger silButton">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
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
