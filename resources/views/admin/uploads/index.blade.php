@extends('layouts.admin')

@section('content')
    <section class="table-responsive">
        <table class="table table-hover" >
            <tr>
                <form class="form-horizontal tasi-form">
                    <section class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="title" class="form-control input-sm"
                                   placeholder="عنوان فایل را جستجو کنید">
                        </div>

                        <div class="col-sm-4">
                            <select  name="upload_type" class="form-control input-sm">
                                <option value="" selected>نوع فایل را جستجو کنید</option>
                                <option value="image">تصویر</option>
                                <option value="video">ویدئو</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" class="btn btn-info btn-sm" value="جستجو کنید">
                        </div>
                    </section>
                </form>
            </tr>
<br>
<br>
<br>
            <tr>
                <th>ردیف</th>
                <th>نام</th>
                <th>ادرس</th>
                <th>عکس</th>
                <th>حذف</th>
            </tr>
            @foreach($uploads as $key => $upload)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $upload->title }}</td>
                    <td><input class="form-control" type="text" value="{{ $upload->url }}"></td>
                    <td>
                        @if($upload->upload_type == 'image')
                            <a href="{{ route('uploads.show', $upload->id) }}"><img src="{{ asset($upload->url) }}" height="40px" width="100px"></a>
                        @else
                            <a href="{{ route('uploads.show', $upload->id) }}" style="width: 100px; height: 40px;" class="btn btn-info"><i class="icon-picture"></i></a>
                        @endif
                    </td>
                    <td>
                           <form action="{{route('uploads.destroy', $upload->id)}}" method="post">
                                {{ method_field('delete') }}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger"><i class="icon-remove"></i></button>
                            </form>
                        {{-- <a href="{{ route('uploads.destroy', $upload->id) }}" class="btn btn-danger"><i class="icon-remove"></i></a></td> --}}
                </tr>
            @endforeach
            {{-- <button class="btn btn-sm btn-primary"><i class="icon-edit"></i></button> --}}
        </table>
        <div class="text-center">
            {{ $uploads->links() }}
        </div>
    </section>
@stop
