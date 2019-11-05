@extends('layouts.admin')
@section('content')
@include('admin.partials.notifications')
    @if($plans && count($plans)>0)
        <table class="table">
            <thead>
            @include('admin.plan.columns')
            </thead>
            @foreach($plans as $plan)
                @include('admin.plan.item',$plan)
            @endforeach
        </table>
    @elseif(count($plans)==0)
        <p>هیچ طرحی وجود ندارد</p>
    @endif
@endsection
