@extends('layouts.admin')
@section('content')
    @include('admin.user.notifications')
    @if($user_packages && count($user_packages)>0)
        <table class="table">
            <tr>
                <th>پکیج</th>
                <th>مبلغ پرداخت شده</th>
                <th>تاریخ پرداخت</th>
            </tr>
            @foreach($user_packages as $package)
                <tr>
                    <td>{{ $package->package_title }}</td>
                    <td>{{ $package->pivot->amount }}</td>
                    <td>{{ $package->pivot->created_at }}</td>
                </tr>
            @endforeach
        </table>
    @elseif(count($user_packages)==0)
        <p>هیچ پکیجی وجود ندارد</p>
    @endif
@endsection

