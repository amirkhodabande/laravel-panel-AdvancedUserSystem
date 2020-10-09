@extends('layouts.admin')

@section('content')

    <section class=" container shadow d-flex justify-content-center p-5" >
        <div class="panel panel-danger p-50 w-400 mb-0 ">
        <h5 class="panel-heading text-uppercase text-center">ویرایش کاربر : {{ $user->name }}</h5>
        <br><br>
        {{-- <main class="panel-body"> --}}
            @php
            if (!empty($role)) {
                $prev = $role;
            } else {
                $prev = "nothing";
            }
            @endphp
            {{-- <a href="{{ route('routeName', array) }}"></a> --}}

                <form action="{{ route('permissions.giverole', [$prev, $user]) }}" method="POST">
                    {{ csrf_field() }}
                    <label for="name">لطفا توجه داشته باشید که فقط کاربران ادمین میتوانند به پنل مدیریت وارد شوند.</label>
                    <button class="btn btn-info">ویرایش</button><br><br>

                    <select id="name" name="name" class="form-control">
                            <option value="user" @if($role == 'user')
                                selected
                            @endif>کاربر معمولی</option>
                            <option value="admin" @if($role == 'admin')
                                selected
                            @endif>مدیر</option>
                    </select>

                </form>
                {{-- {{ dd($all_permissions) }} --}}
                <permission-component user_permissions="{{ $user_permissions }}" all_permissions="{{ $all_permissions }}" user_id="{{ $user->id }}"></permission-component>
        {{-- </main> --}}

        </div>
</section>
<script src="{{ asset('js/app.js') }}"></script>
@stop

