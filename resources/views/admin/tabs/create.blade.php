@extends('layouts.admin')

@section('content')
    <section class="mt-3 container  shadow d-flex justify-content-center p-5 ">

      <h3 class="text-uppercase text-center">ساخت سر صفحه جدید</h3>
      <br><br>

      <form  method="POST" action="{{ route('tab.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group ">
            <label for="tab_id">شاخه</label>
         <select name="tab_id" id="tab_id" class="form-control">
            <option value="0">سر شاخه</option>
             @forelse($tabs as $tab)
                 <option value="{{ $tab->id }}">{{ $tab->title }}</option>
             @empty
             @endforelse
         </select>
          @if ($errors->has('tab_id'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('tab_id') }}</small>
             </span>
            @endif
        </div>

        <div class="form-group ">
            <label for="title">عنوان</label>
          <input id="title" type="text" class="form-control" placeholder="عنوان سر صفحه  را وارد کنید" name="title" value="{{ old('title') }}">
          @if ($errors->has('title'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('title') }}</small>
             </span>
            @endif
        </div>

        <div class="form-group ">
            <label for="url">آدرس</label>
          <input id="url" type="text" class="form-control" placeholder="آدرس مقصد" name="url" value="{{ old('url') }}">
          @if ($errors->has('url'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('url') }}</small>
             </span>
            @endif
        </div>


        <div class="form-group ">
         <span class="form-inline text-primary">
             <label for="act">سر صفحه قابل رویت باشد</label>
             <input type="radio" id="act" value="vis" name="status" checked>
         </span>
         <span class="form-inline text-danger">
             <label for="dis">سر صفحه غیر قابل رویت باشد</label>
             <input type="radio" id="dis" value="unv" name="status">
         </span>
          @if ($errors->has('status'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('status') }}</small>
             </span>
            @endif
        </div>


        <br>
        <button class="btn  btn-block btn-info" type="submit">ساخت سر صفحه</button>
      </form>

    </section>
@stop
