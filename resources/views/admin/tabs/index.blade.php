@extends('layouts.admin')

@section('content')
    <section class="table-responsive">
        <table class="table table-hover" >
            <tr>
                <form class="form-horizontal tasi-form">
                    <section class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="title" class="form-control input-sm"
                                   placeholder="عنوان سر صفحه را جستجو کنید">
                        </div>

                        <div class="col-sm-4">
                            <input type="text" name="url" class="form-control input-sm"
                                   placeholder="آدرس مقصد سر صفحه را جستجو کنید">
                        </div>

                        <div class="col-sm-4">
                            <select name="status" class="form-control input-sm">
                                <option value="" selected>بر اساس وضعیت جستجو کنید</option>
                                <option value="vis">قابل رویت</option>
                                <option value="unv">غیر قابل رویت</option>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <select name="tab_id" class="form-control input-sm">
                                <option value="" selected>بر اساس سر شاخه جستجو کنید</option>
                                <option value="0">سرشاخه</option>
                                @foreach($all as $head)
                                  <option value="{{ $head->id }}">{{ $head->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-2">
                            <input type="submit" class="btn btn-info btn-sm" value="جستجو کنید">
                        </div>
                    </section>
                </form>
            </tr>

            <br><br><br><br><br><br>

            <tr>
                <th>ردیف</th>
                <th>سر شاخه</th>
                <th>عنوان</th>
                <th>ادرس</th>
                <th>وضعیت</th>

                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            @foreach($tabs as $key => $tab)
                <tr>
                    <td>{{ $key }}</td>
                    <td>
                        @if($tab->tab_id == 0)
                            سر شاخه
                        @else
                            @foreach($all as $t)
                                @if($tab->tab_id == $t->id)
                                    {{ $t->title }}
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $tab->title }}</td>
                    <td><input type="text" class="form-control" value="{{ $tab->url }}"></td>
                    <td>
                        @if($tab->status == 'vis')
                            <button class="btn btn-sm btn-success">قابل رویت</button>
                        @else
                                <button class="btn btn-sm btn-danger">غیر قابل رویت</button>
                        @endif
                    </td>

                    <td><a href="{{ route('tab.edit', $tab->id) }}" class="btn btn-sm btn-info">
                        <i class="icon-edit"></i>
                    </a></td>
                   <td>
                           <form action="{{route('tab.destroy', $tab->id)}}" method="post">
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
            {{ $tabs->links() }}
        </div>
    </section>
@stop
