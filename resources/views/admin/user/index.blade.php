@extends('layouts.admin')

@section('content')
    <section class="table-responsive">
        <table class="table table-hover" >
            <tr>
                <form class="form-horizontal tasi-form">
                    <section class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="name" class="form-control input-sm"
                                   placeholder="نام کاربر را جستجو کنید">
                        </div>
                        <div class="col-sm-4">
                            <select  name="user_type" class="form-control input-sm">
                                <option value="" selected>سطح دسترسی و یا همان نوع کاربر را جستجو کنید</option>
                                <option value="admin">ادمین</option>
                                <option value="reporter">گزارش گر</option>
                                <option value="user">کاربر معمولی</option>
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
                <th>ادرس ایمیل</th>
                <th>وضعیت ایمیل</th>
                <th>دسترسی</th>
                <th>تغییر دسترسی</th>
            </tr>
            @foreach($users as $key => $user)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@if($user->email == null)
                            <span class="label label-success">تایید شده</span>
                            @else
                            <span class="label label-danger">تایید نشده</span>
                    @endif</td>

                    <form  method="POST" action="{{ route('users.update', $user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <td>

                            <select name="user_type" class="btn btn-xs btn-default">
                                {{-- <option selected>{{ $user->user_type }}</option> --}}
                                <option value="admin" @if($user->user_type == 'admin') selected @endif>ادمین</option>
                                <option value="reporter" @if($user->user_type == 'reporter') selected @endif>گزارش گر</option>
                                <option value="user" @if($user->user_type == 'user') selected @endif>کاربر معمولی</option>
                            </select>

                        </td>
                        <td><button class="btn btn-sm btn-info"><i class="icon-edit"></i></button></td>
                    </form>
                </tr>
            @endforeach
            {{-- <button class="btn btn-sm btn-primary"><i class="icon-edit"></i></button> --}}
        </table>
        <div class="text-center">
            {{ $users->links() }}
        </div>
    </section>
@stop
