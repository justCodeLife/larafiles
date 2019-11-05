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
            <a class="navbar-brand" href="{{route('home')}}">فروشگاه فایل</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if (!Auth::check())
                    <li class="active"><a href="{{route('frontend.users.register')}}">ثبت نام<span
                                class="sr-only">(current)</span></a></li>
                    <li><a href="{{route('frontend.users.login')}}">ورود</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-hasgroup="true"
                           aria-expanded="false">
                            {{'خوش آمدید  '.Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('frontend.users.dashboard')}}">پنل کاربری</a></li>

                            <li><a href="{{route('frontend.users.logout')}}">خروج</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
