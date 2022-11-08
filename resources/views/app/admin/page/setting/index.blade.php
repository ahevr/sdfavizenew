@extends("app.admin.masterpage")
@section("title","Ege Sedef Avize Yönetim Paneli | Ayarlar")
@section("pageHead")
    <div class="page-heading">
        <h3>Ayarlar Yönetim Paneli</h3>
    </div>
@endsection
@section("content")
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Horizontal Input</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <p>To make label in center of form-control, use <code>.col-form-label</code> class with
                        <code>&lt;label&gt;</code> element. This is default bootstrap class.
                    </p>
                </div>
                <div class="col-md-12">
                    <div class="form-group row align-items-center">
                        <div class="col-lg-2 col-2">
                            <label class="col-form-label">Site Adı :</label>
                        </div>
                        <div class="col-lg-10 col-10">
                            <input type="text" id="first-name" class="form-control" name="fname" placeholder="Site Adı">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection