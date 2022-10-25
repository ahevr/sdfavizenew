<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="{{asset("build/tema/admin/dist/")}}/assets/css/main/app.css">
    <link rel="stylesheet" href="{{asset("build/tema/admin/dist/")}}/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="{{asset("build/tema/admin/dist/")}}/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset("build/tema/admin/dist/")}}/assets/images/logo/favicon.png" type="image/png">
</head>


<body>
<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="{{route("admin.index")}}">
                        <img src="{{asset("build/tema/admin/dist/")}}/assets/images/logo/egesedeflogo.png" alt="Logo">
                    </a>
                </div>
                <h1 class="auth-title">Admin Giriş</h1>
                <p class="auth-subtitle mb-5">Ege Sedef Avize Site Admin Yönetim Paneli Giriş Bilgileri</p>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.check') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" name="email" placeholder="Email">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" name="password" placeholder="Şifre">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Giriş Yap</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
</body>

</html>
