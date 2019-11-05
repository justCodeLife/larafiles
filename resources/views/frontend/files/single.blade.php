@extends('layouts.frontend')
@section('content')
    <div class="col-xs-9 col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">مشاهده جزییات فایل</div>
            <div class="panel-body">
                <p>عنوان : {{$fileItem->file_title}}</p>

                <p>توضیحات فایل : {{$fileItem->file_description}}</p>

                <p>
                    <span>نوع فایل : </span>
                    <span>{{$fileItem->file_type_text}}</span>
                </p>

                <p>
                    <span>تاریخ ثبت : </span>
                    <span>{{$fileItem->created_at}}</span>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">خرید فایل</div>
            <div class="panel-body">
                @if (App\Utility\User::is_user_subscribed($currentUser))
                    <a class="btn btn-primary btn-block"
                       href="{{route('frontend.files.download',[$fileItem->file_id])}}">دانلود
                        فایل</a>
                    <a data-fid="{{$fileItem->file_id}}" href="" class="btn btn-warning btn-block btn_report_file">گزارش
                        خطا</a>
                @else
                    <a href="{{route('frontend.plans.index')}}" class="btn btn-success btn-lg btn-block">خرید این
                        فایل</a>
                @endif
            </div>
        </div>

    </div>
@endsection
