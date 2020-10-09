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
                            <input type="text" name="email" class="form-control input-sm"
                                   placeholder="ایمیل کاربر را جستجو کنید">
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
                 <th>تغییر دسترسی ها</th>
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

                              <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info"><i class="icon-edit"></i></a></td>
                </tr>
            @endforeach
            {{-- <button class="btn btn-sm btn-primary"><i class="icon-edit"></i></button> --}}
        </table>
        <div class="text-center">
            {{ $users->links() }}
        </div>
    </section>
@stop
