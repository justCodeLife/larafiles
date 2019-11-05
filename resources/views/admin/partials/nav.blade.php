<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">مدیریت فروشگاه فایل</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">کاربران<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.users.create') }}">ثبت کاربر جدید</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('admin.users.list') }}">لیست کاربران</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">طرح ها<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.plans.create') }}">ثبت طرح جدید</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('admin.plans.list') }}">لیست طرح ها</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">فایل ها<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.files.create') }}">ثبت فایل جدید</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('admin.files.list') }}">لیست فایلها</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">پکیج ها<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.packages.create') }}">ثبت پکیج جدید</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('admin.packages.list') }}">لیست پکیج ها</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">پرداخت ها<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.payments.list') }}">لیست پرداخت ها</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">دسته بندی ها<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.categories.create') }}">ثبت دسته بندی جدید</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('admin.categories.list') }}">لیست دسته بندی ها</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
