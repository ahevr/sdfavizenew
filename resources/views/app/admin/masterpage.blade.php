<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    @include("app.admin.inc.style")
    @vite('resources/css/app.css')
</head>
<body>
<div id="app">
    @include("app.admin.inc.sidebar")
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        @yield("pageHead")
        <div class="page-content">
            <section class="row">
                @yield("content")
            </section>
        </div>
        @include("app.admin.inc.footer")
    </div>
</div>
@include('sweetalert::alert')
@include("app.admin.inc.script")
</body>
</html>
