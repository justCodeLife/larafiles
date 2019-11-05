<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Larafiles</title>
    <meta name="x-csrf-token" content="{{csrf_token()}}">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="/css/nice-select.css" rel="stylesheet">
    <link href="/css/select2.min.css" rel="stylesheet">
    <link href="/css/sweetalert2.min.css" rel="stylesheet">
    <script src="/js/jquery-3.3.1.js"></script>
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery.nice-select.js"></script>
</head>
<body>
@include('frontend.partials.nav')
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/frontend.js"></script>
<script src="/js/sweetalert2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
        // $('.select2').niceSelect();
    });
</script>
</body>
</html>
