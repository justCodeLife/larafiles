@extends('layouts.frontend')
@section('content')
    <div class="col-xs-12 col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">ورود</div>
            <div class="panel-body">
                @if (session('loginError'))
                    <div class="alert alert-danger">
                        <p>{{session('loginError')}}</p>
                    </div>
                @endif
                <form class="form-horizontal" method="post" action="{{route('post.register')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">نام :</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">ایمیل :</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">رمز عبور :</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">ثبت نام</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
