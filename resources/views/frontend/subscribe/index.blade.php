@extends('layouts.frontend')
@section('content')
    <div class="col-xs-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">خرید اشتراک دانلود فایل</div>
            <div class="panel-body">
                @if (session('planError'))
                    <div class="alert alert-danger">
                        <p>{{session('planError')}}</p>
                    </div>
                @endif

                <div class="alert alert-info">
                    <p>اطلاعات خرید طرح های اشتراکی</p>
                </div>
                <table class="table">
                    <tr>
                        <td>عنوان</td>
                        <td>{{$plan->plan_title}}</td>
                    </tr>
                    <tr>
                        <td>قیمت</td>
                        <td>{{number_format($plan->plan_price)}}</td>
                    </tr>
                    <tr>
                        <td>محدودیت دانلود روزانه</td>
                        <td>{{$plan->plan_limit_download_count}}</td>
                    </tr>
                    <tr>
                        <td>تعداد روز</td>
                        <td>{{$plan->plan_days_count}}</td>
                    </tr>
                </table>
                <form action="{{route('frontend.subscribe.register',[$plan->plan_id])}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="hidden" name="plan_id" value="{{$plan->plan_id}}">
                        <button class="btn btn-success">خرید این طرح</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
