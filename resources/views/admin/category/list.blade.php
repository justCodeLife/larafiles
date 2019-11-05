@extends('layouts.admin')
@section('content')
@include('admin.partials.notifications')
    @if($categories && count($categories)>0)
        <table class="table">
            <thead>
            @include('admin.category.columns')
            </thead>
            @foreach($categories as $category)
                @include('admin.category.item',$category)
            @endforeach
        </table>
    @elseif(count($categories)==0)
        <p>هیچ دسته بندی وجود ندارد</p>
    @endif
@endsection
