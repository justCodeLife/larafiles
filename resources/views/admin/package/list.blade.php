@extends('layouts.admin')
@section('content')
@include('admin.partials.notifications')
    @if($packages && count($packages)>0)
        <table class="table">
            <thead>
            @include('admin.package.columns')
            </thead>
            @foreach($packages as $package)
                @include('admin.package.item',$package)
            @endforeach
        </table>
    @elseif(count($packages)==0)
        <p>هیچ پکیجی وجود ندارد</p>
    @endif
@endsection
