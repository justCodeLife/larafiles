@extends('layouts.frontend')
@section('content')
    <div class="col-xs-9 col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">آخرین فایل های سیستم</div>
            <div class="panel-body">
                @if ($files && count($files)>0)
                    <ul>
                        @foreach($files as $file)
                            <li><a href="{{route('frontend.files.details',$file)}}">{{$file->file_title}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="col-xs-9 col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">آخرین پکیج ها</div>
            <div class="panel-body">
                @if ($packages && count($packages)>0)
                    <ul>
                        @foreach($packages as $package)
                            <li><a href="">{{$package->package_title}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="col-xs-3 col-md-3">

    </div>
@endsection
