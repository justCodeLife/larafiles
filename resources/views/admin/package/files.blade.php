@extends('layouts.admin')
@section('content')
    @include('admin.partials.notifications')
    @if($files && count($files)>0)
        <form action="" method="post">
            {{csrf_field()}}
            <ul>
                @foreach($files as $file)
                    <li>
                        <input type="checkbox" name="files[]"
                               value="{{$file->file_id}}" {{isset($package_files) && in_array($file->file_id,$package_files) ? 'checked':''}} >
                        {{$file->file_title}}
                    </li>
                @endforeach
            </ul>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit_package_files" value="ذخیره اطلاعات">
            </div>
        </form>
    @elseif(count($files)==0)
        <p>هیچ فایلی وجود ندارد</p>
    @endif
@endsection
