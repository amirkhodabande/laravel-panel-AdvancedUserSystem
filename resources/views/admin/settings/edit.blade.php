@extends('layouts.admin')

@section('content')
<section class="mt-3 container shadow d-flex justify-content-center p-5">
    <div class="card card-shadowed p-50 w-400 mb-0 ">
        <h5 class="text-uppercase text-center">ویرایش  </h5>
        <small>این بخش تقریبا در اکثر پروژه ها متفاوت است و به قالب بستگی دارد.</small>
        <br><br>

        <form class="" method="POST" action="{{ route('setting.update', $setting->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}


            <div class="form-group ">
                <label for="company">عنوان شرکت</label>
              <input id="company" type="text" class="form-control" placeholder="نام شرکت یا عنوان شرکت" name="company" value="{{ $setting->company }}">
              @if ($errors->has('company'))
              <span class="alert alert-danger form-control">
                      <small> {{ $errors->first('company') }}</small>
                 </span>
                @endif
            </div>

             <div class="form-group ">
                <label for="logo">لوگو</label>
              <input id="logo" type="text" class="form-control" placeholder="لوگوی شرکت را وارد کنید" name="logo" value="{{ $setting->logo }}">
              @if ($errors->has('logo'))
              <span class="alert alert-danger form-control">
                      <small> {{ $errors->first('logo') }}</small>
                 </span>
                @endif
            </div>

              <div class="form-group ">
                <label for="tell">شماره تماس</label>
              <input id="tell" type="text" class="form-control" placeholder="شماره تماس شرکت را وارد کنید" name="tell" value="{{ $setting->tell }}">
              @if ($errors->has('tell'))
              <span class="alert alert-danger form-control">
                      <small> {{ $errors->first('tell') }}</small>
                 </span>
                @endif
            </div>


            <br>
            <button class="btn btn-bold btn-block btn-info" type="submit">ویرایش</button>
        </form>

    </div>
</section>
@stop
