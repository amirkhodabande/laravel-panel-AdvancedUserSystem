@extends('layouts.admin')

@section('content')
    <section class="mt-3 container  shadow d-flex justify-content-center p-5 ">

      <h3 class="text-uppercase text-center">ساخت صفحه جدید</h3>
      <br><br>

      <form  method="POST" action="{{ route('pager.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group ">
            <label for="title">عنوان</label>
          <input id="title" type="text" class="form-control" placeholder="عنوان صفحه  را وارد کنید" name="title" value="{{ old('title') }}">
          @if ($errors->has('title'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('title') }}</small>
             </span>
            @endif
        </div>

        <div class="form-group ">
              <label for="description">توضیح</label>
          <input id="description" type="text" class="form-control" placeholder="توضیح صفحه  را وارد کنید" name="description" value="{{ old('title') }}">
          @if ($errors->has('description'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('description') }}</small>
             </span>
            @endif
        </div>

        <div class="form-group ">

            <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
            <script>tinymce.init({selector:'textarea'});</script>

            <label for="body">متن اصلی</label>
            <textarea id="body" class="form-control" name="body" rows="10">{{ old('body') }}</textarea>
            @if ($errors->has('body'))
            <span class="alert alert-danger form-control">
                    <small> {{ $errors->first('body') }}</small>
                </span>
                @endif
        </div>

        <div class="form-group ">
         <span class="form-inline text-primary">
             <label for="act">صفحه فعال باشد</label>
             <input type="radio" id="act" value="act" name="status" checked>
         </span>
         <span class="form-inline text-danger">
             <label for="dis">صفحه غیر فعال باشد</label>
             <input type="radio" id="dis" value="dis" name="status">
         </span>
          @if ($errors->has('status'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('status') }}</small>
             </span>
            @endif
        </div>


        <br>
        <button class="btn  btn-block btn-info" type="submit">ساخت صفحه</button>
      </form>

    </section>
@stop
