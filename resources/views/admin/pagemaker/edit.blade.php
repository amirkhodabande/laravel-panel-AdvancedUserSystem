@extends('layouts.admin')

@section('content')
<section class="mt-3 container shadow d-flex justify-content-center p-5">
    <div class="card card-shadowed p-50 w-400 mb-0 ">
        <h5 class="text-uppercase text-center">ویرایش صفحه : <b>{{ $pager->title }}</b></h5>
        <br><br>

        <form class="" method="POST" action="{{ route('pager.update', $pager->url) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group ">
                <label for="title">عنوان</label>
                <input id="title" type="text" class="form-control"  name="title" value="{{ $pager->title }}">
                @if ($errors->has('title'))
                <span class="alert alert-danger form-control">
                        <small> {{ $errors->first('title') }}</small>
                    </span>
                    @endif
            </div>

        <div class="form-group ">
             <label for="description">توضیح</label>
          <input id="description" type="text" class="form-control" name="description" value="{{ $pager->description }}">
          @if ($errors->has('description'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('description') }}</small>
             </span>
            @endif
        </div>

        <div class="form-group ">
            <script>tinymce.init({selector:'textarea'});</script>
            <label for="body">متن اصلی</label>
            <textarea id="body" class="form-control" name="body" rows="10">{{ $pager->body }}</textarea>
            @if ($errors->has('body'))
            <span class="alert alert-danger form-control">
                    <small> {{ $errors->first('body') }}</small>
                </span>
                @endif
        </div>

        <div class="form-group ">
         <span class="form-inline text-primary">
             <label for="act">صفحه فعال باشد</label>
             <input type="radio" id="act" value="act" name="status" @if($pager->status == 'act')
                checked
             @endif>
         </span>
         <span class="form-inline text-danger">
             <label for="dis">صفحه غیر فعال باشد</label>
             <input type="radio" id="dis" value="dis" name="status" @if($pager->status == 'dis')
                checked
             @endif>
         </span>
          @if ($errors->has('status'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('status') }}</small>
             </span>
            @endif
        </div>


            <br>
            <button class="btn btn-bold btn-block btn-primary" type="submit">ویرایش</button>
        </form>

    </div>
</section>
@stop
