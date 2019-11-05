@extends('layouts.admin')
@section('content')
    @include('admin.user.notifications')
    @if($users && count($users)>0)
        <table class="table">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>موجودی</th>
                <th>تعداد پکیج های خریداری شده</th>
                <th>عملیات</th>
            </tr>
            </thead>
            @foreach($users as $user)
                @include('admin.user.item',$user)
                @endforeach
        </table>
    @elseif(count($users)==0)
        <p>هیچ کاربری وجود ندارد</p>
    @endif
@endsection
