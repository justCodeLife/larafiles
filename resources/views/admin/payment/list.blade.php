@extends('layouts.admin')
@section('content')
@include('admin.partials.notifications')
    @if($payments && count($payments)>0)
        <table class="table">
            <thead>
            @include('admin.payment.columns')
            </thead>
            @foreach($payments as $payment)
                @include('admin.payment.item',$payment)
            @endforeach
        </table>
    @elseif(count($payments)==0)
        <p>هیچ پرداختی وجود ندارد</p>
    @endif
@endsection
