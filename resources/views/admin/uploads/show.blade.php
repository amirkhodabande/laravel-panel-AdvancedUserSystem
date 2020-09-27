{{-- @extends('layouts.admin')

@section('content')
    <section class="container" style="box-shadow: 0px 0px 10px 1px skyblue; margin-top: 10px;">
        <a href="{{ route('uploads.index') }}" class="btn sm btn-info" style=""><i class="icon-list"></i></a>
        <img src="{{ asset($upload->url) }}" alt="لطفا این عکس را حذف کنید و  دوباره آپلود کنید"  style="margin: 0px 25%;">
    </section>
@stop --}}
<a href="{{ route('uploads.index') }}">بازگشت</a>
<hr>
@if($upload->upload_type == 'image')
    <img src="{{ asset($upload->url) }}"  alt="لطفا این عکس را حذف کنید و  دوباره آپلود کنید">
@elseif($upload->upload_type == 'video')
    <video src="{{ asset($upload->url) }}" controls alt="لطفا این عکس را حذف کنید و  دوباره آپلود کنید"></video>
@endif
