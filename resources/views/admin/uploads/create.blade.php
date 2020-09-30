@extends('layouts.admin')

@section('content')
    <section class="mt-3 container  shadow d-flex justify-content-center p-5 ">

      <h3 class="text-uppercase text-center">اپلود تصویر</h3>
      <br><br>

      <form  method="POST" action="{{ route('uploads.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group ">
          <input type="text" class="form-control" placeholder="عنوان عکس  را وارد کنید" name="title" value="{{ old('title') }}">
          @if ($errors->has('title'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('title') }}</small>
             </span>
            @endif
        </div>


         <div class="form-group ">
          <input type="file" class="form-control" name="url" value="{{ old('url') }}">
          @if ($errors->has('url'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('url') }}</small>
             </span>
            @endif
        </div>


        <br>
        <button class="btn  btn-block btn-info" type="submit">آپلود</button>
      </form>

</section>
@stop
