<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Larafiles Admin Panel</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="/css/nice-select.css" rel="stylesheet">
    <link href="/css/select2.min.css" rel="stylesheet">
    <script src="/js/jquery-3.3.1.js"></script>
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery.nice-select.js"></script>
</head>
<body>
@include('admin.partials.nav')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($panel_title) ? $panel_title : '' }}</div>
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/bootstrap.min.js"></script>
<script src="/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        // $('.select2').niceSelect();
    });
</script>
</body>
</html>
