@extends('layouts.admin')

@section('content')
    <section class="table-responsive">
        <table class="table table-hover" >
            <tr>
                <form class="form-horizontal tasi-form">
                    <section class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="title" class="form-control input-sm"
                                   placeholder="عنوان صفحه را جستجو کنید">
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
                <th>عنوان</th>
                <th>وضعیت</th>
                <th>ادرس</th>
                <th>توضیح</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            @foreach($pages as $key => $page)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $page->title }}</td>
                    <td>
                        @if($page->status == 'act')
                            <button class="btn btn-sm btn-success">فعال</button>
                        @else
                                <button class="btn btn-sm btn-danger">غیر فعال</button>
                        @endif
                    </td>
                    <td><input type="text" class="form-control" value="{{ $page->url }}"></td>
                    <td>{{ Str::limit($page->description, 100, '...') }}</td>

                    <td><a href="{{ route('pager.edit', $page->url) }}" class="btn btn-sm btn-info">
                        <i class="icon-edit"></i>
                    </a></td>
                   <td>
                           <form action="{{route('pager.destroy', $page->url)}}" method="post">
                                {{ method_field('delete') }}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-sm btn-danger"><i class="icon-remove"></i></button>
                            </form>
                    </td>

                </tr>
            @endforeach
            {{-- <button class="btn btn-sm btn-primary"><i class="icon-edit"></i></button> --}}
        </table>
        <div class="text-center">
            {{ $pages->links() }}
        </div>
    </section>
@stop
